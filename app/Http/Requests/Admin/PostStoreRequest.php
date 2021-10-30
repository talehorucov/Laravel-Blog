<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'title' => 'required|min:5|max:150',
            'content' => 'required',
            'thumbnail' => 'required|image|mimes:jpg,png,jpeg|max:3072',
            'category_id' => 'required|exists:categories,id'
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Başlıq',
            'content' => 'Məzmun',
            'thumbnail' => 'Şəkil',
            'category_id' => 'Kateqoriya'
        ];
    }
}
