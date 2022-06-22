<?php

namespace App\Http\Requests\Dashboard\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'          => ['required','string'],
            'email'         => ['required','unique:admins,email,'.$this->id],
            'password'      => ['nullable','confirmed'],
            'image'         => ['nullable','image'],
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>    'اسم المسؤول مطلوب',
            'name.string'=>      'اسم المسؤول غير صالح',
            'email.required'=>   'البريد مطلوب',
            'email.unique'=>     'البريد مسجل لدينا بالفعل',
            'password.confirmed'=>   'كلمة السر غير متطابقة',
            'image.image'=>   'الصورة غير صالحة',
        ];
    }
}
