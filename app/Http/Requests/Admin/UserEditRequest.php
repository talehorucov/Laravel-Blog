<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'name' => 'required|min:2|max:50',
            'email' => 'required|email|max:255',
            'role_id' => 'nullable|exists:roles,id',
            'image' => 'image|mimes:jpg,png,jpeg|max:3072'
        ];
    }
}
