<?php

namespace App\Http\Requests\Admin\CanaisVenda;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateCanaisVenda extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.canais-venda.edit', $this->canaisVenda);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'descricao' => ['sometimes', 'string'],
            'comissao' => ['nullable', 'numeric'],
            'unidade_comissao' => ['nullable', 'array'],
            'desconto' => ['nullable', 'numeric'],
            'unidade_desconto' => ['nullable', 'array'],

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
