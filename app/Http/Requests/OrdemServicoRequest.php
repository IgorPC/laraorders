<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrdemServicoRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'observacoes' => 'required|min:10|max:300'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Campo Obrigatorio',
            'min' => 'Esse campo deve conter no minimo min caracteres',
            'max' => 'Esse campo deve conter no minimo max caracteres'
        ];
    }
}
