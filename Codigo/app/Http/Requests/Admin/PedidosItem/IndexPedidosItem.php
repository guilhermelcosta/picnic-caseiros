<?php

namespace App\Http\Requests\Admin\PedidosItem;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class IndexPedidosItem extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        Log::info('passei no authorize');
        Log::info(Gate::allows('admin.pedidos-item.index'));
        Log::info('final');
        return Gate::allows('admin.pedidos-item.index');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'orderBy' => 'in:id,pedido_id,numero_sequencial,produto_id,quantidade,preco_unitario,observacao_id|nullable',
            'orderDirection' => 'in:asc,desc|nullable',
            'search' => 'string|nullable',
            'page' => 'integer|nullable',
            'per_page' => 'integer|nullable',

        ];
    }
}
