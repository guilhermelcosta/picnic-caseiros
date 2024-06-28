<?php

namespace App\Services;

use App\Models\Fornecedor;
use App\Models\Observacao;

class ObservacoesService
{
    /**
     * Cria uma observação
     * @param array $dados payload com informações da observação
     * @return mixed observação criada no banco de dados
     */
    public function store(array $dados): mixed
    {
        if ($dados['observacao']['observacao']) {
            return Observacao::create(['observacao' => $dados['observacao']['observacao']]);
        }
        return null;
    }

    /**
     * Atualiza uma observação
     * @param array $dados dados atualizado da observação
     * @param mixed $objeto dados do objeto que chama o serviço (Fornecedor, Cliente, etc)
     * @return array array de dados
     */
    public function update(array $dados, mixed $objeto): array
    {
//        Se estiver vindo vazio do front, quer dizer que a observação foi deletada pelo usuário
//        Portanto, ela também deve ser deletada no banco
        if (empty(trim($dados['observacao']['observacao']))) {
            if ($dados['observacao_id']) {
                $observacao = $objeto->observacao;
                $observacao->delete();
                $dados['observacao_id'] = null;
            }
        } else {
//            Se não tiver vazio, quer dizer que o usuário possui uma observação salva no formulário
//            Nesse caso, ela deve ser atualizada
            if (empty($dados['observacao_id'])) {
                $observacao = $this->store($dados);
                $dados['observacao_id'] = $observacao->id;
            } else {
                $observacao = $objeto->observacao;
                $observacao->update($dados['observacao']);
            }
        }
        return $dados;
    }

    /**
     * Delete uma observação
     * @param Observacao $observacao payload com informações da observação
     * @return void
     */
    public function destroy(Observacao $observacao): void
    {
        $observacao->delete();
    }
}
