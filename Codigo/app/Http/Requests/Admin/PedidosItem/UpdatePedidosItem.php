<?php

namespace App\Http\Requests\Admin\PedidosItem;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdatePedidosItem extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.pedidos-item.edit', $this->pedidosItem);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'pedido_id' => ['sometimes', 'string'],
            'numero_sequencial' => ['sometimes', 'integer'],
            'produto_id' => ['sometimes', 'string'],
            'quantidade' => ['sometimes', 'integer'],
            'preco_unitario' => ['sometimes', 'numeric'],
            'observacao_id' => ['nullable', 'string'],
            
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
