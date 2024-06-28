<?php

namespace App\Http\Requests\Admin\Pedido;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class IndexPedido extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.pedido.index');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'orderBy' => 'in:id,cliente_id,canais_venda_id,data_confirmacao_pedido,data_entrega_prevista,data_entrega_realizada,forma_pagto_entrada_id,data_limite_entrada,porcentagem_entrada,data_pedido,valor_entrada,data_pagto_entrada,forma_pagto_restante_id,data_restante,valor_restante,observacao_id,endereco_entrega_id|nullable',
            'orderDirection' => 'in:asc,desc|nullable',
            'search' => 'string|nullable',
            'page' => 'integer|nullable',
            'per_page' => 'integer|nullable',

        ];
    }
}
