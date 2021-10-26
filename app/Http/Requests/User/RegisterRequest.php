<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'password' => 'required|min:6|max:8',
            'confirm_password' => 'required|same:password'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Ad',
            'email' => 'Email',
            'password' => 'Şifrə',
            'confirm_password' => 'Şifrə Təsdiq'
        ];
    }
}
