<?php

namespace App\Http\Requests\Admin\Insumo;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateInsumo extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.insumo.edit', $this->insumo);
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
            'observacao_id' => ['nullable', 'integer'],
            'percentual_desperdicio' => ['nullable', 'numeric'],
            'quantidade_referencia' => ['sometimes', 'numeric'],
            'unidade_referencia' => ['sometimes', 'array'],
            'preco_pos_desperdicio' => ['sometimes', 'numeric'],
            'is_ativo' => ['sometimes', 'boolean'],
            'observacao.observacao' => ['nullable', 'string'],

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
