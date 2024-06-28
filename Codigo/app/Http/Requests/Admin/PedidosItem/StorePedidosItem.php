<?php

namespace App\Http\Requests\Admin\PedidosItem;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StorePedidosItem extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.pedidos-item.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'pedido_id' => ['required', 'string'],
            'numero_sequencial' => ['required', 'integer'],
            'produto_id' => ['required', 'string'],
            'quantidade' => ['required', 'integer'],
            'preco_unitario' => ['required', 'numeric'],
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
