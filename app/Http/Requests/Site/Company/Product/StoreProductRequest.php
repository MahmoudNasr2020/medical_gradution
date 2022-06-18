<?php

namespace App\Http\Requests\Site\Company\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'          => ['required','string'],
            'price'         => ['required'],
            'production_country'  => ['required'],
            'image'       => ['required','image'],
            'description'       => ['required'],
            'category_id' => ['required','not_in:0'],
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>   'اسم المنتج مطلوب',
            'name.string'=>   'اسم المنتج غير صالح',
            'price.required'=>   'سعر المنتج مطلوب',
            'production_country.required'=>   'الدولة المنتجة مطلوبة',
            'image.required'=>   'الصورة مطلوبة',
            'image.image'=>   'الصورة غير صالحة',
            'description.required'=>   'الوصف مطلوب',
            'category_id.required'=>   'القسم  مطلوب',
            'category_id.not_in'=>   'القسم  مطلوب',
        ];
    }
}
