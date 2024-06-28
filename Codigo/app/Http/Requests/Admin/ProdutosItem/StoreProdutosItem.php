<?php

namespace App\Http\Requests\Admin\Produtositem;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreProdutositem extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.produtos-item.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'produto_id' => ['required', 'string'],
            'receita_id' => ['required', 'string'],
            'insumo_id' => ['required', 'string'],
            'quantidade' => ['required', 'numeric'],
            'porcentagem_mao_obra' => ['required', 'numeric'],
            'porcentagem_lucro' => ['required', 'numeric'],
            
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
