<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentStore extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required|string|unique:payments|max:255'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nome é informação obrigatória'
        ];
    }
}
