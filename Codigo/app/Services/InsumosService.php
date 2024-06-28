<?php

namespace App\Services;

use App\Helpers\Constants;
use App\Http\Requests\Admin\Insumo\BulkDestroyCliente;
use App\Http\Requests\Admin\Insumo\BulkDestroyInsumo;
use App\Models\Insumo;
use Illuminate\Support\Facades\DB;

class InsumosService
{
    private ObservacoesService $observacaoService;

    public function __construct()
    {
        $this->observacaoService = new ObservacoesService();
    }

    /**
     * Cria um insumo
     * @param array $dados payload com informações do insumo
     * @return mixed insumo criado no banco de dados
     */
    public function store(array $dados): Insumo
    {
        $observacao = $this->observacaoService->store($dados);
        $dados['observacao_id'] = is_null($observacao)
            ? null
            : $observacao->id;
        $dados['unidade_referencia'] = $dados['unidade_referencia']['value'];
        $dados['quantidade_referencia'] = Constants::UM;

        return Insumo::create($dados);
    }

    /**
     * Atualiza um insumo
     * @param array $dados dados atualizados do insumo
     * @param Insumo $insumo modelo do insumo
     * @return void
     */
    public function update(array $dados, Insumo $insumo): void
    {
        $dados['unidade_referencia'] = $dados['unidade_referencia']['value'];
        $dados['quantidade_referencia'] = Constants::UM;
        $dados = $this->observacaoService->update($dados, $insumo);
        $insumo->update($dados);
    }

    /**
     * Delete um insumo
     * @param Insumo $insumo payload com informações do insumo
     * @return void
     */
    public function destroy(Insumo $insumo): void
    {
        $insumo->delete();
    }

    /**
     * Deleta vários objetos do tipo insumo
     * @param BulkDestroyInsumo $insumos payload com informações dos insumos
     * @return void
     */
    public function bulkDestroy(BulkDestroyInsumo $insumos): void
    {
        
        DB::transaction(static function () use ($insumos) {
            collect($insumos->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Insumo::whereIn('id', $bulkChunk)->delete();
                });
        });
    }
}
