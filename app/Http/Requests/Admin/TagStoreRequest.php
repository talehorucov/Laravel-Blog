<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TagStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'name' => 'required|min:2|max:255'
        ];
    }
    
    public function attributes()
    {
        return [
            'name' => 'Etiket'
        ];
    }
}
