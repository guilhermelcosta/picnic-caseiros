<?php
## CHECK TO DELETE
// namespace App\Http\Requests\Admin\Endereco;

// use Illuminate\Foundation\Http\FormRequest;
// use Illuminate\Support\Facades\Gate;
// use Illuminate\Validation\Rule;

// class UpdateEndereco extends FormRequest
// {
//     /**
//      * Determine if the user is authorized to make this request.
//      *
//      * @return bool
//      */
//     public function authorize(): bool
//     {
//         return Gate::allows('admin.endereco.edit', $this->endereco);
//     }

//     /**
//      * Get the validation rules that apply to the request.
//      *
//      * @return array
//      */
//     public function rules(): array
//     {
//         return [
//             'logradouros_tipo_id' => ['sometimes', 'string'],
//             'logradouro' => ['sometimes', 'string'],
//             'numero' => ['nullable', 'integer'],
//             'complemento' => ['nullable', 'string'],
//             'bairro' => ['sometimes', 'string'],
//             'cidade' => ['sometimes', 'string'],
//             'estado' => ['sometimes', 'string'],
//             'pais' => ['sometimes', 'string'],
//             'cep' => ['nullable', 'string'],

//         ];
//     }

//     /**
//      * Modify input data
//      *
//      * @return array
//      */
//     public function getSanitized(): array
//     {
//         $sanitized = $this->validated();


//         //Add your code for manipulation with request data here

//         return $sanitized;
//     }
// }
