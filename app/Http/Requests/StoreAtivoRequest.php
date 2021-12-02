<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAtivoRequest extends FormRequest
{

    public function authorize()
    {
        return false;
    }

    public function rules()
    {
        return [
            'ticker'  => 'required|min:5|max:6|unique:ativos',
            'dtinicio' => 'required|date_format:Y/m/d',
            'alocacao' => 'required',
            'dy'   => 'required',
            'precoentrada'  => 'required|regex:/^\d+(\,\d{1,2})?$/',
            'precoatual'  => 'required|regex:/^\d+(\,\d{1,2})?$/',
            'precoteto'  => 'required|regex:/^\d+(\,\d{1,2})?$/',
        ];
    }
}
