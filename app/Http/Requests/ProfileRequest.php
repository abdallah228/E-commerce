<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'email'=>'required|email|unique:admins,email,'.$this->id,
            'password'=>'nullable|confirmed|min:6',
            
            
        ];
    }
    public function messages()
    {
        return [
            //
            'name.required'=>'يجب عليك ادخال الاسم',
            'email.email'=>'يجب عليك ادخال البريد الالكترونى بطريقه صحيحه',
            'email.required'=>'يجب عليك ادخال البريد الالكترونى ',
            'email.unique'=>'عفوا هذا البريد الالكترونى موجود من قبل',
            'password.confirmed'=>'عفوا كلمه المرور غير متطابقه',
                ];
    }
}
