<?php

namespace App\Services;

use App\Http\Requests\Admin\Receita\BulkDestroyReceita;
use App\Models\Receita;

class ReceitasService
{
    private ObservacoesService $observacaoService;
    private IngredientesService $ingredienteService;

    public function __construct()
    {
        $this->observacaoService = new ObservacoesService();
        $this->ingredienteService = new IngredientesService();
    }

    /**
     * Cria uma receita
     * @param array $dados payload com informações da receita
     * @return Receita receita criada no banco de dados
     */
    public function store(array $dados): Receita
    {
        $observacao = $this->observacaoService->store($dados);
        $ingredientes = $dados['ingredientes'];

        $dados['deleted'] = false;
        $dados['unidade_porcao'] = $dados['unidade_porcao']['value'];
        $dados['observacao_id'] = is_null($observacao)
            ? null
            : $observacao->id;

        $receita = Receita::create($dados);

        foreach ($ingredientes as $ingrediente)
            $this->ingredienteService->store($ingrediente, $receita);

        return $receita;
    }

    /**
     * Atualiza uma receita
     * @param array $dados dados atualizados da receita
     * @param Receita $receita modelo da receita
     * @return void
     */
    public function update(array $dados, Receita $receita): void
    {
        $dados = $this->observacaoService->update($dados, $receita);
        $dados = $this->ingredienteService->update($dados, $receita);
        $receita->update($dados);
    }

    /**
     * Delete uma receita
     * @param Receita $receita payload com informações da receita
     * @return void
     */
    public function destroy(Receita $receita): void
    {
        $receita->delete();
    }

    /**
     * Deleta vários objetos do tipo receita
     * @param BulkDestroyReceita $receitas payload com informações das receitas
     * @return void
     */
    public function bulkDestroy(BulkDestroyReceita $receitas): void
    {
        $listaIds = collect($receitas->data['ids']);

        foreach ($listaIds as $id) {
            $receita = Receita::where('id', $id)->first();
            $receita->delete();
        }
    }
}
