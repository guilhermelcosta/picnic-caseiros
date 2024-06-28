<?php

namespace App\Http\Requests\Admin\Cliente;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateCliente extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.cliente.edit', $this->cliente);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'nome' => ['sometimes', 'string'],
            'sobrenome' => ['nullable', 'string'],
            'apelido' => ['nullable', 'string'],
            'documentos_tipo_id' => ['nullable', 'array'],
            'documento' => ['nullable', 'string'],
            'data_aniversario' => ['nullable', 'date'],
            'endereco_id' => ['nullable', 'integer'],
            'endereco' => ['nullable', 'array'],
            'observacao_id' => ['nullable', 'integer'],
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
