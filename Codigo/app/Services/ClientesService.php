<?php

namespace App\Services;

use App\Helpers\Constants;
use App\Http\Requests\Admin\Cliente\BulkDestroyCliente;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;

class ClientesService
{
    private EnderecosService $enderecoService;
    private ObservacoesService $observacaoService;

    public function __construct()
    {
        $this->enderecoService = new EnderecosService();
        $this->observacaoService = new ObservacoesService();
    }

    /**
     * Cria um cliente
     * @param array $dados payload com informações do cliente
     * @return mixed cliente criado no banco de dados
     */
    public function store(array $dados): Cliente
    {
        if ($dados['documentos_tipo_id'])
            $dados['documentos_tipo_id'] = $dados['documentos_tipo_id']['id'];

        $observacao = $this->observacaoService->store($dados);
        $endereco = $this->enderecoService->store($dados);
        $dados['observacao_id'] = is_null($observacao)
            ? null
            : $observacao->id;
        $dados['endereco_id'] = is_null($endereco)
            ? null
            : $endereco->id;
        return Cliente::create($dados);
    }

    /**
     * Atualiza um cliente
     * @param array $dados dados atualizados do cliente
     * @param Cliente $cliente modelo do cliente
     * @return void
     */
    public function update(array $dados, Cliente $cliente): void
    {
        if ($dados['documentos_tipo_id'])
            $dados['documentos_tipo_id'] = $dados['documentos_tipo_id']['id'];

        $dados = $this->observacaoService->update($dados, $cliente);
        $dados = $this->enderecoService->update($dados, $cliente);
        $cliente->update($dados);
    }

    /**
     * Delete um cliente
     * @param Cliente $cliente payload com informações do cliente
     * @return void
     */
    public function destroy(Cliente $cliente): void
    {
        if (!is_null($cliente->endereco))
            $this->enderecoService->destroy($cliente->endereco);
        if (!is_null($cliente->observacao))
            $this->observacaoService->destroy($cliente->observacao);
        $cliente->delete();
    }

    /**
     * Deleta vários objetos do tipo cliente
     * @param BulkDestroyCliente $clientes payload com informações dos clientes
     * @return void
     */
    public function bulkDestroy(BulkDestroyCliente $clientes): void
    {
        $observacaoService = $this->observacaoService;
        $enderecoService = $this->enderecoService;

        DB::transaction(function () use ($clientes, $observacaoService, $enderecoService) {
            collect($clientes->data['ids'])
                ->chunk(Constants::MIL)
                ->each(function ($bulkChunk) use ($observacaoService, $enderecoService) {
                    $clientes = Cliente::whereIn('id', $bulkChunk)->get();

                    foreach ($clientes as $cliente) {
                        $observacao = $cliente->observacao;
                        $endereco = $cliente->endereco;

                        if ($observacao)
                            $observacaoService->destroy($observacao);

                        if ($endereco)
                            $enderecoService->destroy($endereco);

                        $cliente->delete();
                    }
                });
        });
    }
}
