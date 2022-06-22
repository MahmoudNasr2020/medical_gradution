<?php

namespace App\Http\Requests\Site\Company\Setting;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSetting extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'site_name'          => ['required','string'],
            'image'          =>     ['nullable','image'],
        ];
    }

    public function messages()
    {
        return [
            'site_name.required' =>   'الاسم مطلوب',
            'site_name.string'   =>   'الاسم غير صالح',
            'image.image'       => 'الصورة غير صالحة',
        ];
    }
}
