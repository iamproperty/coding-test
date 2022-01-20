<?php

namespace App\Rules;

use App\Services\validations\ValidatingPostCodeService;
use Illuminate\Contracts\Validation\Rule;

class PostcodeRule implements Rule
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
        return (new ValidatingPostCodeService)->execute($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The postcode is invalid.';
    }
}
