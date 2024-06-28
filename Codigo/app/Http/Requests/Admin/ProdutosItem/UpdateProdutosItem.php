<?php

namespace App\Http\Requests\Admin\Produtositem;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateProdutositem extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.produtos-item.edit', $this->produtositem);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'produto_id' => ['sometimes', 'string'],
            'receita_id' => ['sometimes', 'string'],
            'insumo_id' => ['sometimes', 'string'],
            'quantidade' => ['sometimes', 'numeric'],
            'porcentagem_mao_obra' => ['sometimes', 'numeric'],
            'porcentagem_lucro' => ['sometimes', 'numeric'],
            
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
