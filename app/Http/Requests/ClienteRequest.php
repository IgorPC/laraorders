<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'nome' => 'required|min:8',
            'email' => 'required',
            'celular' => 'required|min:8',
            'rua' => 'required',
            'numero' => 'required',
            'bairro' => 'required',
            'cidade' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Campo Obrigatorio',
            'min' => 'Esse campo deve conter no minimo 8 caracteres'
        ];
    }
}
