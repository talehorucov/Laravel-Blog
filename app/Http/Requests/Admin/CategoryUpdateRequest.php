<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'name' => 'required|min:2|max:100',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:3072'
        ];
    }
}
