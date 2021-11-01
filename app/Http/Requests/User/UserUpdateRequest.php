<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'password' => 'required|max:20',
            'phone' => 'max:30',
            'role_id' => 'nullable|exists:roles,id',
            'image' => 'image|mimes:jpg,png,jpeg|max:3072'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Ad',
            'email' => 'Email',
            'password' => 'Şifrə',
            'phone' => 'Nömrə',
            'role_id' => 'Vəzifə',
            'image' => 'Şəkil'
        ];
    }
}
