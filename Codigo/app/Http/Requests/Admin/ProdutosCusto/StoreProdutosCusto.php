<?php

namespace App\Http\Requests\Admin\ProdutosCusto;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreProdutosCusto extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.produtos-custo.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'produto' => ['required', 'array'],
            'canal_venda' => ['required', 'array'],
            'inicio_vigencia' => ['nullable', 'date'],
            'fim_vigencia' => ['nullable', 'date'],
            'valor_custo' => ['required', 'numeric'],
            'valor_venda' => ['required', 'numeric'],
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
