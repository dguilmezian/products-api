<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateFormRequest extends FormRequest
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
            'id'=>'required',
            'price' => 'integer',
            'price_sale' => 'integer',
            'stock' => 'integer',
        ];
    }

    public function messages()
    {
        return [
            'id'=>'ID missing',
            'price' => 'Price must be a number.',
            'price_sale' => 'Price for sale must be a number',
            'stock' => 'Stock must be a number',
        ];
    }
}
