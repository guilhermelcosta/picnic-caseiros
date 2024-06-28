<?php

namespace App\Http\Requests\Admin\Fornecedor;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreFornecedor extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.fornecedor.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'nome' => ['required', 'string'],
            'endereco_id' => ['nullable', 'string'],
            'endereco' => ['nullable', 'array'],
            'nome_contato' => ['nullable', 'string'],
            'observacao_id' => ['nullable', 'string'],
            'observacao.observacao' => ['nullable', 'string'],
            'is_ativo' => ['required', 'boolean'],
            'contatos' => ['nullable', 'array'],
            'contato_id' => ['nullable', 'integer'],
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
