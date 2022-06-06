<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'category_name' => ['required','unique:categories,category_name']
        ];
    }

    public function messages()
    {
        return [
            'category_name.required' => 'اسم القسم مطلوب',
            'category_name.unique' => 'اسم القسم مسجل بالفعل',
        ];
    }
}
