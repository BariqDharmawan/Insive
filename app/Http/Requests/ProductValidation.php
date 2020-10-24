<?php

namespace App\Http\Requests;

use App\Rules\ContainAlpha;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class ProductValidation extends FormRequest
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

        switch ($this->method()) {
            case 'POST':
                return [
                    'product_name' => ['required', 'min:3', 'max:50', 'unique:products', new ContainAlpha],
                    'price' => ['required', 'integer'],
                    'qty' => ['required', 'integer', 'min:1'],
                    'product_img' => ['required']
                ];
            case 'PUT':
                return [
                    'product_name' => ['required', 'min:3', 'max:50', new ContainAlpha],
                    'price' => ['required', 'integer'],
                    'qty' => ['required', 'integer', 'min:1'],
                    'product_img' => ['nullable']
                ];
        }
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'price' => str_replace(',', '', $this->price)
        ]);
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'product_name.regex' => 'A title is required',
            'body.required'  => 'A message is required',
        ];
    }
}
