<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageProductRequest extends FormRequest
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
            'product_id'=>'required|exists:products,id',
            'document'=>'required|array|min:1',
            'document.*'=>'required|string',

        ];
    }//end function
    public function messages()
    {  
        return [
        

        ];
    }//end function
}
