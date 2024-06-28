<?php

namespace App\Http\Requests\Admin\Receita;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateReceita extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.receita.edit', $this->receita);
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
            'modo_preparo' => ['sometimes', 'string'],
            'rendimento' => ['sometimes', 'integer'],
            'porcao' => ['sometimes', 'numeric'],
            'unidade_porcao' => ['sometimes', 'array'],
            'validade_dias' => ['nullable', 'integer'],
            'preparo_altera_peso' => ['sometimes', 'boolean'],
            'percentual_altera_peso' => ['nullable', 'numeric'],
            'observacao_id' => ['nullable', 'integer'],
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
