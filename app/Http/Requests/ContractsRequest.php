<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContractsRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'contract_number' => 'required|string|max:45unique:contracts,contract_number, {$this->contract->id}',
            'client_id' => 'required',
            'tags' => 'required',
            'advertsement_id' => 'required',
            'category_id' => 'required',
            'date_start' => 'required',
            'date_end' => 'required',
            'file' =>  'mimes:jpeg,png,bmp,tiff,svg |max:4096'
        ];
    }

    public function messages()
    {
        return [
            'contract_number.required' => 'Digite um número de contrato',
            'tags.required' => 'Você deve digitar no mínimo uma palavra chave',
            'unique' => "Já existe este número de contrato",
            'client_id.required' => 'Selecione um cliente',
            'advertsement_id.required' => 'Selecione um plano de negócio',
            'category_id.required' => 'Selecione uma categoria',
            'date_start.required' => 'Data de início é obrigatório',
            'date_end.required' => 'Data final é uma informação obrigatória',
            'mimes' => 'Apenas arquivos JPG, PNG ou TIF são aceitos.'
        ];
    }
}
