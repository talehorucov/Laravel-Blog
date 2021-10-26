<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'email' => 'email|required',
            'password' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'email' => 'Email'
        ];
    }
}
