<?php

namespace App\Http\Requests\Admin\PedidosDesconto;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdatePedidosDesconto extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.pedidos-desconto.edit', $this->pedidosDesconto);
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
            'pedidos_item_id' => ['nullable', 'string'],
            'desconto' => ['sometimes', 'numeric'],
            'unidade_desconto' => ['sometimes', 'string'],
            'valor_desconto' => ['sometimes', 'numeric'],
            
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
