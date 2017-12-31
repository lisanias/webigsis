<?php

namespace App\Http\Requests\Discipulo;

use Illuminate\Foundation\Http\FormRequest;

class TelefoneFormRequest extends FormRequest
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
            'numero' => array(
                'required', 
                'min:8', 
                'max:20',
                'regex:/(\s+?\(\s?[0-9]{2}\s?\)|\s?[0-9]{2}|\s?[0-9]{4,5})\s?([0-9]{4,5})?(\s|-)?[0-9]{4}\s?/'
            )
            //'regex:/^(\([0-9]{2}\)|[0-9]{2}|[0-9]{4,5})\s?([0-9]{4,5})?(\s|-)?[0-9]{4}$/'
        ];
    }

    public function messages()
    {
        return [
            'numero.required'   => 'É obrigatório inserir um numero de telefone. Para apagar use o botão apagar.',
            'numero.min'        => "O número de telefone inserido está errado, precisa ter pelo menos 8 digitos.",
            'numero.max'        => "O número de telefone inserido está errado, deve ter digitos a mais, verifique por favor.",
            'numero.regex'     => "O numero de telefone é invalido. Utilize o formato (99) 99999-9999",
        ];
    }
}


