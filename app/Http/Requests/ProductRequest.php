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
        if (\Request::isMethod('get')) {return [];}
        return [
            'subcategory' => 'required|exists:sub_categories,id',
            'prod_name' => 'required|min:3|max:25|unique:products,prod_name|alpha_dash',
            'price' => 'required|numeric|min:1|max:99999'
        ];
    }
}
