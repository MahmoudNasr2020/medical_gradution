<?php

namespace App\Http\Requests\Site\User\Profile;

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
            'name'          => ['required','string'],
            'email'         => ['required','email','unique:users,email,'.$this->id,'unique:companies,email'],
            'phone_number'  => ['required','unique:users,phone_number,'.$this->id,'unique:companies,phone_number'],
            'address'       => ['required'],
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
            'phone_number.required'=>   'رقم الهاتف مطلوب',
            'phone_number.unique'=>   'رقم الهاتف مسجل لدينا بالفعل',
            'address.required'=>   'العنوان مطلوب',
            'password.confirmed'=>   'كلمة السر غير متطابقة',
            'image.image' => 'الصورة غير صالحة',
        ];
    }
}
