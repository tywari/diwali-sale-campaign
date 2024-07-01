<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiwaliSaleRequest extends FormRequest
{
    public function rules()
    {
        return [
            'products' => 'required|array',
            'products.*' => 'required|numeric',
            'rule' => 'required|string'
        ];
    }
}