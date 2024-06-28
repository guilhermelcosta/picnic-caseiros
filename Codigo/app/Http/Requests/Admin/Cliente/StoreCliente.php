<?php

namespace App\Http\Requests\Admin\Cliente;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreCliente extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.cliente.create');
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
            'sobrenome' => ['nullable', 'string'],
            'apelido' => ['nullable', 'string'],
            'documento' => ['nullable', 'string'],
            'documentos_tipo_id' => ['nullable', 'array'],
            'data_aniversario' => ['nullable', 'date'],
            'endereco_id' => ['nullable', 'string'],
            'endereco' => ['nullable', 'array'],
            'observacao_id' => ['nullable', 'string'],
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
