<?php

namespace App\Http\Requests\Admin\Pedido;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StorePedido extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.pedido.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'cliente_id' => ['required', 'string'],
            'canais_venda_id' => ['required', 'string'],
            'data_confirmacao_pedido' => ['nullable', 'date'],
            'data_entrega_prevista' => ['nullable', 'date'],
            'data_entrega_realizada' => ['nullable', 'date'],
            'forma_pagto_entrada_id' => ['nullable', 'string'],
            'data_limite_entrada' => ['nullable', 'date'],
            'porcentagem_entrada' => ['nullable', 'numeric'],
            'data_pedido' => ['required', 'date'],
            'valor_entrada' => ['nullable', 'numeric'],
            'data_pagto_entrada' => ['nullable', 'date'],
            'forma_pagto_restante_id' => ['nullable', 'string'],
            'data_restante' => ['nullable', 'date'],
            'valor_restante' => ['nullable', 'numeric'],
            'observacao_id' => ['nullable', 'string'],
            'endereco_entrega_id' => ['nullable', 'string'],
            
        ];
    }

    /**
    * Modify input data
    *
    * @return array
    */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();

        //Add your code for manipulation with request data here

        return $sanitized;
    }
}
