<?php

namespace App\Http\Requests\Admin\PedidosCancelamento;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StorePedidosCancelamento extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.pedidos-cancelamento.create');
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
            'pedidos_item_id' => ['nullable', 'string'],
            'data_solicitacao' => ['required', 'string'],
            'taxa_cancelamento' => ['required', 'numeric'],
            'unidade' => ['required', 'string'],
            'valor_cancelamento' => ['required', 'numeric'],
            'valor_reembolso' => ['required', 'numeric'],
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
