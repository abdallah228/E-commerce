<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'name'=>'required',
            'slug'=>'required|unique:categories,slug,'.$this->id,
            'parent_id'=>'required|exists:categories,id',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'من فضلك ادخل الاسم',
            'slug.required'=>'من فضلك ادخل الرابط المطلوب',
            'slug.unique'=>'عفوا هذا الرابط موجود من قبل',
            'parent_id.required'=>'يجب ان تختار القسم الرئيسي',
            //'photo.required'=>'من فضلك قم باختيار صوره',
        ];
    }
}
