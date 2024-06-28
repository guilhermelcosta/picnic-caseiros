<?php

namespace App\Services;

use App\Helpers\Constants;
use App\Models\Contato;
use App\Models\Fornecedor;

class ContatosService
{

    /**
     * Cria um contato
     * @param array $dados payload com informações do contato
     * @param Fornecedor $fornecedor payload com informações do fornecedor
     * @return mixed contato criado no banco de dodos
     */
    public function store(array $dados, Fornecedor $fornecedor)
    {
        if ($dados['contatos']) {
            $contato = $dados['contatos'][Constants::ZERO];
            $contato['contatos_tipo_id'] = $dados['contatos'][Constants::ZERO]['contato_tipo_id']['id'];
            $contato['fornecedor_id'] = $fornecedor['id'];
            return Contato::create($contato);
        }
        return null;
    }

    /**
     * Atualiza um contato
     * @param array $dados payload com informações do contato
     * @param Fornecedor $fornecedor payload com informações do fornecedor
     */
    public function update(array $dados, Fornecedor $fornecedor)
    {
        if ($dados['contatos']) {
            if (!empty(array_filter($dados['contatos'][Constants::ZERO]))) {
//                Caso o fornecedor não tenha um contato, mas adicionou um
                if (is_null($dados['contatos'][Constants::ZERO]['contato_id'])) {
                    $contato = $this->store($dados, $fornecedor);
                    $dados['contatos'][Constants::ZERO]['contato_id'] = $contato['id'];
                } else {
                    $contato = $fornecedor->contatos[Constants::ZERO];
//                Caso o fornecedor tenha um contato, mas o usuário o retirou no update
//                O contato será deletado caso o usuário retire o número do contato ou o seu tipo, haja vista que ambas informações
//                são obrigatórias para a tabela de contatos
                    if (is_null($dados['contatos'][Constants::ZERO]['contato'])
                        or is_null($dados['contatos'][Constants::ZERO]['contato_tipo_id'])) {
                        $this->destroy($contato);
                    } else {
//                Caso o usuário tenha atualizado as informações do contato
                        $dados['contatos'][Constants::ZERO]['contatos_tipo_id'] = $dados['contatos'][Constants::ZERO]['contato_tipo_id']['id'];
                        $contato->update($dados['contatos'][Constants::ZERO]);
                    }
                }
            }
        }
        return $dados;
    }

    /**
     * Delete uma contato
     * @param Contato $contato payload com informações do contato
     * @return void
     */
    public function destroy(Contato $contato)
    {
        $contato->delete();
    }
}
