<?php

namespace App\Http\Requests\Admin\PedidosCancelamento;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdatePedidosCancelamento extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.pedidos-cancelamento.edit', $this->pedidosCancelamento);
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
            'data_solicitacao' => ['sometimes', 'string'],
            'taxa_cancelamento' => ['sometimes', 'numeric'],
            'unidade' => ['sometimes', 'string'],
            'valor_cancelamento' => ['sometimes', 'numeric'],
            'valor_reembolso' => ['sometimes', 'numeric'],
            'data_reembolso' => ['nullable', 'date'],
            
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
