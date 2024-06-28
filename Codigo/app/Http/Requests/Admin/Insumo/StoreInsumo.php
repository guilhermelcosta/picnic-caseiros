<?php

namespace App\Http\Requests\Admin\Insumo;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreInsumo extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.insumo.create');
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
            'observacao_id' => ['nullable', 'string'],
            'percentual_desperdicio' => ['nullable', 'numeric'],
            'unidade_referencia' => ['required', 'array'],
            'preco_pos_desperdicio' => ['required', 'numeric'],
            'is_ativo' => ['required', 'boolean'],
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
