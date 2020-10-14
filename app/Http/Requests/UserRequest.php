<?php

namespace App\Http\Requests;

use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => ['nullable', 'min:3', 'string', 'max:100'],
            'email' => ['sometimes', 'email:rfc', 'min:8'],
            'current_password' => ['sometimes', 'nullable', 'min:8', new MatchOldPassword],
            'new_password' => ['sometimes', 'nullable', 'min:8'],
            'confirm_new_password' => ['sometimes', 'same:new_password']
        ];

        return $rules;
    }
}
