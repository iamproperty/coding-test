<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Zttp\Zttp;

class Postcode implements Rule
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
        $response = Zttp::get("https://api.postcodes.io/postcodes/{$value}");
        return $response->status() === 200;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ":attribute does not appear to be a valid postcode.";
    }
}
