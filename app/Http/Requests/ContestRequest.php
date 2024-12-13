<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContestRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'dateStart' => 'required|integer', //Timestamp en segundos
            'dateEnd' => 'required|integer',   //Timestamp en segundos
            'numCategories' => 'required|integer',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
