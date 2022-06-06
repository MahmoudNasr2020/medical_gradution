<?php

namespace App\Http\Requests\Site\User;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => ['required','email'],
            'password' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'email.required'=>   'البريد الالكتروني مطلوب',
            'email.email'=>   'البريد الالكتروني غير صالح',
            'password.required'=>   'كلمة السر مطلوبة',
        ];
    }
}
