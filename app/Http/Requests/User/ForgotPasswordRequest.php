<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class ForgotPasswordRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'email' => 'email|required'
        ];
    }

    public function attributes()
    {
        return [
            'email' => 'Email Ünvanı'
        ];
    }
}
