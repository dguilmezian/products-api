<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
            'name' => 'required',
            'price' => 'required|integer',
            'price_sale' => 'required|integer',
            'category'=>'required',
            'brand'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'name' => 'Product name missing.',
            'price' => 'Price missing.',
            'price_sale' => 'Price for sale missing',
            'category' => 'Category missing.',
            'brand' => 'Brand missing.'
        ];
    }
}
