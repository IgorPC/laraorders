<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicosRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'nome' => 'required|min:6',
            'descricao' => 'required|min:10'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Campo Obrigatorio',
            'min' => 'Esse campo deve conter no minimo :min caracteres'
        ];
    }
}
