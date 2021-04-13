<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientsRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required|string|max:150',
            'document' => 'required',
            'cep' => 'required',
            //'phone' => 'required',
            'address' => 'required',
            'logo' =>  'mimes:jpeg,png,bmp,tiff,svg |max:4096'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nome é informação obrigatória',
            'email.required' => 'Digite um e-mail válido',
            'email.unique' => 'Já existe um cliente cadastrado com este e-mail',
            'phone.required' => 'Telefone/WhatsApp é informação obrigatória',
            'document.required' => 'CNPJ/CPF é informação obrigatória',
            'cep.required' => 'CEP é informação obrigatória',
            'address.required' => 'Endereço é informação obrigatória',
            'mimes' => 'Apenas arquivos JPG, PNG ou TIF são aceitos.',
            'unique' => 'Já existe um e-mail cadastrado com estes dados.'
        ];
    }
}
