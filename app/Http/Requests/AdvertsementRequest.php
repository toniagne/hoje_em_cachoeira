<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdvertsementRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
           // 'name' => 'required|string|unique:advertsements|max:255',
            'details' => 'required',
            'amount' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Nome é informação obrigatória',
            'details.required'  => 'Detalhes é uma informação obrigatória',
            'amount.required'  => 'Digite um valor válido',
        ];
    }
}
