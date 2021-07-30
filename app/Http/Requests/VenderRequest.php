<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VenderRequest extends FormRequest
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
            'name'=>'required|max:100',
            'logo'=>'required_without:id|mimes:jpg,jpeg,png',
            'mobile' =>'required|max:100|unique:vendors,mobile,'.$this -> id,
            'address'=>'required|max:100',
            'category'=>'required|exists:main_categories,id',
            'email'  => 'required|email|unique:vendors,email,'.$this -> id,
            'password'=>'required_without:id|min:6'
        ];
    }

    public function messages()
    {
        return [
            'required'=>'this is field required',
            'max'=>'too long',
            'category.exists'=>'this category not found',
            'email.email'=>'email not correct',
            'logo.required_without'=>'this field is required'

        ];
    }
}
