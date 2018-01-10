<?php

namespace App\Http\Requests\Celula;

use Illuminate\Foundation\Http\FormRequest;

class CelulaFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'              => 'required|min:3|max:255',
            'logradouro'        => 'nullable|max:200',
            'numero'            => 'max:20|required_with:logradouro',
            'bairro'            => 'nullable|max:150',
            'cidade'            => 'nullable|max:150',
            'uf'                => 'nullable|max:2',
            'cep'               => 'nullable|regex:/^\d{5}\-?\d{3}$/',
        ];
    }

    public function messages()
    {
        return [
            'name.required'         => 'O discipulo não tem nome.',
            'name.min'              => 'O nome não está correto, tem menos de 3 letras!',
            'name.max'              => 'O nome está muito grande e não pode ser inserido, se estiver correto, abrevie para ter menos de 255 caracteres, contando com os espaços.',
            'logradouro.max'        => 'O endreço não pode ter mais de 200 caracteres.',
            'numero.required_with'  => "Não foi inserido um número para esse endereço. Caso não tenha mesmo o número coloque, por exemplo 's/n'.",
            'numero.max'            => "O campo 'Numero' precisa ser menor que 20 caracteres.",
            'bairro.max'            => 'O nome do bairro precisa ter menos de 150 caracteres.',
            'cidade.max'            => 'O nome da cidade precisa ter menos de 150 caracteres.',
            'uf.max'                => 'O Estado presisa ser inserido de forma abreviada com 2 caracteres. Ex: PR, SP.',
            'cep.regex'             => 'O CEP tem alguma coisa errada. Use o formato 12345-123 ou use apenas números',
        ];
    }
}
