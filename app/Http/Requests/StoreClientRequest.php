<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
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
            'Nname'      => 'required|min:5|max:80',
            'Nemail'     => 'required|min:7|max:50',
            'Naddress'   => 'required|min:2|max:50',
        ];
    }

    public function messages()
    {
        return [
            'Nname.required'     => 'É necessário informar o nome.',
            'Nname.min'          => 'Digite o nome completo.',
            'Nname.max'          => 'O nome execede o tamnho permitido',
            'emai.required'      => 'Informe um email, por favor!',
            'Nemail.min'         => 'O emael não parece ser válido.',
            'Nemail.max'         => 'O email execede o tamanho permitido',
            'Naddress.required'  => 'Informe seu endereço, por favor',
            'Naddress.min'       => 'Endereço inválido',
            'Naddress.max'       => 'Tamanho do endereço fornecido excede o permitido',
        ];
    }
}
