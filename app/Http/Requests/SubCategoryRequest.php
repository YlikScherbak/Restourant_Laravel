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
        if (\Request::isMethod('get')) {return [];}
        return [
            'subcategory' => 'required|min:3|max:15|unique:sub_categories,sub_category|alpha_dash',
            'mainCategory' => 'required|exists:menu_categories,id',
        ];
    }
}
