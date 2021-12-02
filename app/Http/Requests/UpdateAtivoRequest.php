<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAtivoRequest extends FormRequest
{

    public function authorize()
    {
        return false;
    }

    public function rules()
    {
        return [
            'ticker'  => 'min:5|max:6|unique:ativos',
            'dtinicio' => 'date_format:Y/m/d',
            'precoentrada'  => 'regex:/^\d+(\,\d{1,2})?$/',
            'precoatual'  => 'regex:/^\d+(\,\d{1,2})?$/',
            'precoteto'  => 'regex:/^\d+(\,\d{1,2})?$/',
        ];
    }
}
