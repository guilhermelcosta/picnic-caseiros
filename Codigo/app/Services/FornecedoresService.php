<?php

namespace App\Services;

use App\Helpers\Constants;
use App\Http\Requests\Admin\Fornecedor\BulkDestroyFornecedor;
use App\Models\Fornecedor;
use Illuminate\Support\Facades\DB;

class FornecedoresService
{
    private EnderecosService $enderecoService;
    private ObservacoesService $observacaoService;
    private ContatosService $contatoService;

    public function __construct()
    {
        $this->enderecoService = new EnderecosService();
        $this->observacaoService = new ObservacoesService();
        $this->contatoService = new ContatosService();
    }

    /**
     * Cria um fornecedor
     * @param array $dados payload com informações do fornecedor
     * @return mixed fornecedor criado no banco de dados
     */
    public function store(array $dados): Fornecedor
    {
        $observacao = $this->observacaoService->store($dados);
        $endereco = $this->enderecoService->store($dados);
        $dados['observacao_id'] = is_null($observacao)
            ? null
            : $observacao->id;
        $dados['endereco_id'] = is_null($endereco)
            ? null
            : $endereco->id;
        $fornecedor = Fornecedor::create($dados);
        $this->contatoService->store($dados, $fornecedor);
        return $fornecedor;
    }

    /**
     * Atualiza um fornecedor
     * @param array $dados dados atualizados do fornecedor
     * @param Fornecedor $fornecedor modelo do fornecedor
     * @return void
     */
    public function update(array $dados, Fornecedor $fornecedor): void
    {
        $dados = $this->observacaoService->update($dados, $fornecedor);
        $dados = $this->enderecoService->update($dados, $fornecedor);
        $dados = $this->contatoService->update($dados, $fornecedor);
        $fornecedor->update($dados);
    }

    /**
     * Delete um fornecedor
     * @param Fornecedor $fornecedor payload com informações do fornecedor
     * @return void
     */
    public function destroy(Fornecedor $fornecedor): void
    {
        if (!is_null($fornecedor->endereco))
            $this->enderecoService->destroy($fornecedor->endereco);
        if (!is_null($fornecedor->observacao))
            $this->observacaoService->destroy($fornecedor->observacao);
        if (!empty($fornecedor->contatos[Constants::ZERO]))
            $this->contatoService->destroy($fornecedor->contatos[Constants::ZERO]);
        $fornecedor->delete();
    }

    public function bulkDestroy(BulkDestroyFornecedor $fornecedores): void
    {
        $observacaoService = $this->observacaoService;
        $enderecoService = $this->enderecoService;
        $contatoService = $this->contatoService;

        DB::transaction(function () use ($fornecedores, $observacaoService, $enderecoService, $contatoService) {
            collect($fornecedores->data['ids'])
                ->chunk(Constants::MIL)
                ->each(function ($bulkChunk) use ($observacaoService, $enderecoService, $contatoService) {
                    $fornecedores = Fornecedor::whereIn('id', $bulkChunk)->get();

                    foreach ($fornecedores as $fornecedor) {
                        $observacao = $fornecedor->observacao;
                        $endereco = $fornecedor->endereco;
                        $contato = $fornecedor->contatos;

                        if ($observacao)
                            $observacaoService->destroy($observacao);

                        if ($endereco)
                            $enderecoService->destroy($endereco);

                        if ($contato)
                            $contatoService->destroy($contato[Constants::ZERO]);

                        $fornecedor->delete();
                    }
                });
        });
    }
}
