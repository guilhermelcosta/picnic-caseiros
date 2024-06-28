<?php
## CHECK TO DELETE
// namespace App\Http\Requests\Admin\Endereco;

// use Illuminate\Foundation\Http\FormRequest;
// use Illuminate\Support\Facades\Gate;
// use Illuminate\Validation\Rule;

// class StoreEndereco extends FormRequest
// {
//     /**
//      * Determine if the user is authorized to make this request.
//      *
//      * @return bool
//      */
//     public function authorize(): bool
//     {
//         return Gate::allows('admin.endereco.create');
//     }

//     /**
//      * Get the validation rules that apply to the request.
//      *
//      * @return array
//      */
//     public function rules(): array
//     {
//         return [
//             'logradouros_tipo_id' => ['required', 'string'],
//             'logradouro' => ['required', 'string'],
//             'numero' => ['nullable', 'integer'],
//             'complemento' => ['nullable', 'string'],
//             'bairro' => ['required', 'string'],
//             'cidade' => ['required', 'string'],
//             'estado' => ['required', 'string'],
//             'pais' => ['required', 'string'],
//             'cep' => ['nullable', 'string'],

//         ];
//     }

//     /**
//     * Modify input data
//     *
//     * @return array
//     */
//     public function getSanitized(): array
//     {
//         $sanitized = $this->validated();

//         //Add your code for manipulation with request data here

//         return $sanitized;
//     }
// }
