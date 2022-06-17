<?php

namespace App\Http\Requests\Site\Contact;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>   ['required','string'],
            'email' => ['required','email'],
            'mobile' => ['required'],
            'message' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>   'الاسم مطلوب',
            'name.string'=>   'الاسم غير صالح',
            'email.required'=>   'البريد الالكتروني مطلوب',
            'email.email'=>   'البريد الالكتروني غير صالح',
            'mobile.required'=>   'رقم الهاتف مطلوب',
            'message.required'=>   'العنوان مطلوب',
        ];
    }
}
