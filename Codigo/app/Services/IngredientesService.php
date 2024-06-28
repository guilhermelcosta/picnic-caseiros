<?php

namespace App\Services;

use App\Models\Receita;
use App\Models\ReceitasIngrediente;

class IngredientesService
{
    /**
     * Cria um ingrediente
     * @param array $dados payload com informações do ingrediente
     * @param Receita $receita objeto de receita
     * @return mixed ingrediente criado no banco de dados
     */
    public function store(array $dados, Receita $receita): mixed
    {
        if ($dados['ingrediente']) {
            return ReceitasIngrediente::create([
                'receita_id' => $receita->id,
                'insumo_id' => $dados['ingrediente']['id'],
                'quantidade' => $dados['quantidade'],
                'unidade' => $dados['unidade']['value']
            ]);
        }
        return null;
    }

    /**
     * Atualiza um ingrediente
     * @param array $dados dados atualizado do ingrediente
     * @param mixed $objeto dados do objeto que chama o serviço (Fornecedor, Cliente, etc)
     * @return array array de dados
     */
    public function update(array $dados, mixed $objeto): array
    {
        $ingredientesCriados = [];
        ReceitasIngrediente::where('receita_id', $objeto->id)->delete();
        foreach ($dados['ingredientes'] as $ingrediente) {
            $ingredientesCriados[] = ReceitasIngrediente::create([
                'receita_id' => $objeto->id,
                'insumo_id' => $ingrediente['ingrediente']['id'],
                'quantidade' => $ingrediente['quantidade'],
                'unidade' => $ingrediente['unidade']['value']
            ]);
        }
        $dados['ingredientes'] = $ingredientesCriados;
        return $dados;
    }

}
