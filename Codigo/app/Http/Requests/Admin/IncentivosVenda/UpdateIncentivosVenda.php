<?php

namespace App\Http\Requests\Admin\IncentivosVenda;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateIncentivosVenda extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.incentivos-venda.edit', $this->incentivosVenda);
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
            'valor' => ['sometimes', 'numeric'],
            'unidade' => ['sometimes', 'array'],
            'maximo_moeda' => ['sometimes', 'numeric'],
            'inicio_vigencia' => ['nullable', 'string'],
            'fim_vigencia' => ['nullable', 'string'],
            'is_ativo' => ['sometimes', 'boolean'],

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
