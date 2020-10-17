<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ContainAlpha implements Rule
{

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return preg_match("/[a-z]/i", $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attribute must be contain(s) alphabeth';
    }
}
