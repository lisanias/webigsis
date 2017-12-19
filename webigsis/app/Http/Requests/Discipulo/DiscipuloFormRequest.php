<?php

namespace App\Http\Requests\Discipulo;

use Illuminate\Foundation\Http\FormRequest;

class DiscipuloFormRequest extends FormRequest
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
            'batismo'           => 'required_with:batismo_data,recebidoModo_id',
            'name'              => 'required|min:3|max:255',
            'email'             => 'nullable|email',
            'logradouro'        => 'nullable|max:200',
            'numero'            => 'max:20|required_with:logradouro',
            'bairro'            => 'nullable|max:150',
            'cidade'            => 'nullable|max:150',
            'uf'                => 'nullable|max:2',
            'cep'               => 'nullable|regex:/^\d{5}\-?\d{3}$/',
            'sexo'              => 'required',
            'nascimento_cidade' => 'nullable|max:150',
            'nascimento_uf'     => 'nullable|max:2'
        ];
    }

    public function messages()
    {
        return [
            'batismo.required_with' => "Selecine 'É batizado'. Se preencheu a data de batismo e/ou foi recebido como membro, é porque ja está batizado.",
            'name.required'         => 'O discipulo não tem nome.',
            'name.min'              => 'O nome não está correto, tem menos de 3 letras!',
            'name.max'              => 'O nome está muito grande e não pode ser inserido, se estiver correto, abrevie para ter menos de 255 caracteres, contando com os espaços.',
            'email.email'           => 'Insira um endereço de email válido.',
            'logradouro.max'        => 'O endreço não pode ter mais de 200 caracteres.',
            'numero.required_with'  => "Não foi inserido um número para esse endereço. Caso não tenha mesmo o número coloque, por exemplo 's/n'.",
            'numero.max'            => "O campo 'Numero' precisa ser menor que 20 caracteres.",
            'bairro.max'            => 'O nome do bairro precisa ter menos de 150 caracteres.',
            'cidade.max'            => 'O nome da cidade precisa ter menos de 150 caracteres.',
            'uf.max'                => 'O Estado presisa ser inserido de forma abreviada com 2 caracteres. Ex: PR, SP.',
            'cep.regex'             => 'O CEP tem alguma coisa errada. Use o formato 12345-123 ou use apenas números',
            'sexo.required'         => 'Não foi definido o sexo.',
            'nascimento_cidade.max' => 'O nome da cidade de nascimento precisa ter menos de 150 caracteres.',
            'nascimento_uf.max'     => 'O Estado de nascimento presisa ser inserido de forma abreviada com 2 caracteres. Ex: PR, SP.'
        ];
    }
}
