<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class MainCategoryRequest extends FormRequest
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
            //'photo'=>'required'.$this->id,
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'من فضلك ادخل الاسم',
            'slug.required'=>'من فضلك ادخل الرابط المطلوب',
            'slug.unique'=>'عفوا هذا الرابط موجود من قبل',
            //'photo.required'=>'من فضلك قم باختيار صوره',
        ];
    }
}
