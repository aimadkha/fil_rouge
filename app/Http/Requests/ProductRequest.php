<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'author'=>'required|max:100',
            'price'=>'required|max:100',
            'pub_date'=>'required|max:100',
            'photo'=>'required_without:id',
            'type'=>'required|max:100',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'name required',
            'photo.required'=>'photo required',
        ];
    }
}
