<?php

namespace App\Rules;

use App\Services\PostCodeService;
use Illuminate\Contracts\Validation\Rule;

class PostCodeRule implements Rule
{

    /**
     * Determine if the validation rule passes.
     *
     * @param  string $attribute
     * @param  mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $serviceObj = new  PostCodeService();
        return $serviceObj->validate($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Invalid Postcode';
    }
}