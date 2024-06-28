<?php

namespace App\Services;

use App\Helpers\Constants;
use App\Models\Endereco;

class EnderecosService
{
    /**
     * Cria um endereço
     * @param array $dados payload com informações do endereço
     * @return mixed endereço criado no banco de dados
     */
    public function store(array $dados): mixed
    {
        if ($dados['endereco']) {
            foreach ($dados['endereco'] as $endereco) {
                if (!empty(trim($endereco))) {
//                    Setado logradouros_tipo_id = 1, pois a implementação dessa tabela foi descontinuada
                    $dados['endereco']['logradouros_tipo_id'] = Constants::UM;
                    return Endereco::create($dados['endereco']);
                }
            }
        }
        return null;
    }

    /**
     * Atualiza um endereço
     * @param array $dados dados atualizado do endereço
     * @param mixed $objeto dados do objeto que chama o serviço (Fornecedor, Cliente, etc)
     * @return array array de dados
     */
    public function update(array $dados, mixed $objeto): array
    {
        if (empty($dados['endereco'])) {
            $dados['endereco'] = null;
        } else {
            $possuiEndereco = false;
            foreach ($dados['endereco'] as $value) {
                if (!empty(trim($value))) {
                    $possuiEndereco = true;
                    break;
                }
            }
            if ($possuiEndereco) {
                if (empty($dados['endereco_id'])) {
//                    Setado logradouros_tipo_id = 1, pois a implementação dessa tabela foi descontinuada
                    $dados['endereco']['logradouros_tipo_id'] = Constants::UM;
                    $endereco = $this->store($dados);
                    $dados['endereco_id'] = $endereco->id;
                } else {
                    $endereco = $objeto->endereco;
                    $endereco->update($dados['endereco']);
                }
            } else {
                if ($dados['endereco_id']) {
                    $endereco = $objeto->endereco;
                    $dados['endereco_id'] = null;
                    $this->destroy($endereco);
                }
            }
        }
        return $dados;
    }

    /**
     * Delete um endereço
     * @param Endereco $endereco payload com informações do endereço
     * @return void
     */
    public
    function destroy(Endereco $endereco): void
    {
        $endereco->delete();
    }
}
