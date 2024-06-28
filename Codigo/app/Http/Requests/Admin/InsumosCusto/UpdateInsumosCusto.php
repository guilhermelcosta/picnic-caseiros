<?php

namespace App\Http\Requests\Admin\InsumosCusto;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateInsumosCusto extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.insumos-custo.edit', $this->insumosCusto);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'data_compra' => ['required', 'date'],
            'insumosCustos' => ['required', 'array'],
            'insumosCustos[*].insumo' => ['required', 'array'],
            'insumosCustos[*].marca' => ['nullable', 'array'],
            'insumosCustos[*].fornecedor' => ['nullable', 'array'],
            'insumosCustos[*].quantidade' => ['required', 'numeric'],
            'insumosCustos[*].unidade' => ['required', 'array'],
            'insumosCustos[*].valor_compra' => ['required', 'numeric'],
            'insumosCustos[*].valor_unitario' => ['required', 'numeric'],

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
