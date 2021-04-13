<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:45',
            'icon' =>  'mimes:jpeg,png,bmp,tiff,svg |max:4096'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nome é informação obrigatória',
            'mimes' => 'Apenas arquivos JPG, PNG ou TIF são aceitos.',
        ];
    }
}
