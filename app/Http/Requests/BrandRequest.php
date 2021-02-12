<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
            'name'=>'required|unique:brand_translations,name,'.$this->id,
            //'photo'=>'|mimes:jpg,jpeg,png',

        ];
    }//end function
    public function messages()
    {  
        return [
         'name.required'=>'يجب ان تدخل اسم الماركه',
         'name.unique'=>'اسم الماركه هذا موجود مسبقا',
    //  'photo.required'=>'برجاء اختيار الصوره ',
    //  'photo.mimes'=>'يجب ان تختار صوره',

        ];
    }//end function
}
