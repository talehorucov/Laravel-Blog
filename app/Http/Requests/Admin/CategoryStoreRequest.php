<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|min:2|max:100',
            'image' => 'image|mimes:jpg,png,jpeg|max:3072'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Ad',
            'image' => 'Şəkil'
        ];
    }
}
