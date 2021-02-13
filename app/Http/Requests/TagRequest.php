<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
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
            'slug'=>'required|unique:tags,slug,'.$this->id,
        ];
    }
    public function messages()
    {
        return [
            //
            'name.required'=>'يجب كتابه اسم العلامه التجاريه',
            'slug.required'=>'من فضلك قم بكتابه رابط العلامه التجاريه',
            'slug.unique'=>'رابط العلامه التجاريه موجود من قبل',
        ];
    }
    
}
