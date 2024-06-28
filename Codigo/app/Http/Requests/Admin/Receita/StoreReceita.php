<?php

namespace App\Http\Requests\Admin\Receita;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreReceita extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.receita.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'descricao' => ['required', 'string'],
            'modo_preparo' => ['required', 'string'],
            'rendimento' => ['required', 'integer'],
            'porcao' => ['required', 'numeric'],
            'unidade_porcao' => ['required', 'array'],
            'validade_dias' => ['nullable', 'integer'],
            'preparo_altera_peso' => ['required', 'boolean'],
            'percentual_altera_peso' => ['nullable', 'numeric'],
            'observacao_id' => ['nullable', 'string'],
            'observacao.observacao' => ['nullable', 'string'],
            'ingredientes' => ['nullable', 'array'],
            'deleted_at' => ['nullable', 'date'],
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
