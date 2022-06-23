<?php

namespace App\Http\Requests\Dashboard\Profile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'           => ['required','string'],
            'email'          => ['required','email','unique:admins,email,'.$this->id],
            'password'       => ['nullable','confirmed'],
            'image'          => ['nullable','image'],
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>   'الاسم مطلوب',
            'name.string'=>   'الاسم غير صالح',
            'email.required'=>   'البريد الالكتروني مطلوب',
            'email.email'=>   'البريد الالكتروني غير صالح',
            'email.unique'=>   'البريد الالكتروني مسجل لدينا بالفعل',
            'password.confirmed'=>   'كلمة السر غير متطابقة',
            'image.image' => 'الصورة غير صالحة',
        ];
    }
}
