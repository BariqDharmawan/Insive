<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiscountValidation extends FormRequest
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

        $rules = [
            'product_id' => ['required', 'integer'],
            'discount_price' => ['required', 'integer', 'min:1000']
        ];

        if ($this->isMethod('POST') or $this->isMethod('post')) {
            $rules['product_id'][] = 'unique:product_discount';
        }

        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'product_id.unique' => "You can't set another discount on same product",
            'discount_price.min' => "The final price must be at least Rp. " . number_format(1000)
        ];
    }
}
