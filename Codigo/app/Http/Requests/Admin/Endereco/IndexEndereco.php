<?php
## CHECK TO DELETE
// namespace App\Http\Requests\Admin\Endereco;

// use Illuminate\Foundation\Http\FormRequest;
// use Illuminate\Support\Facades\Gate;

// class IndexEndereco extends FormRequest
// {
//     /**
//      * Determine if the user is authorized to make this request.
//      *
//      * @return bool
//      */
//     public function authorize(): bool
//     {
//         return Gate::allows('admin.endereco.index');
//     }

//     /**
//      * Get the validation rules that apply to the request.
//      *
//      * @return array
//      */
//     public function rules(): array
//     {
//         return [
//             'orderBy' => 'in:id,logradouros_tipo_id,logradouro,numero,complemento,bairro,cidade,estado,pais,cep|nullable',
//             'orderDirection' => 'in:asc,desc|nullable',
//             'search' => 'string|nullable',
//             'page' => 'integer|nullable',
//             'per_page' => 'integer|nullable',

//         ];
//     }
// }
