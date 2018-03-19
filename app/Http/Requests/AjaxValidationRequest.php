<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AjaxValidationRequest extends FormRequest
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
            'name'      => 'required|min:5|max:80',
            'email'     => 'required|min:7|max:50',
            'address'   => 'required|min:2|max:50',
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'É necessário informar o nome.',
            'name.min'          => 'Digite o nome completo.',
            'name.max'          => 'O nome execede o tamnho permitido',
            'emai.required'     => 'Informe um email, por favor!',
            'email.min'         => 'O emael não parece ser válido.',
            'email.max'         => 'O email execede o tamanho permitido',
            'address.required'  => 'Informe seu endereço, por favor',
            'address.min'       => 'Endereço inválido',
            'address.max'       => 'Tamanho do endereço fornecido excede o permitido',
        ];
    }
}
