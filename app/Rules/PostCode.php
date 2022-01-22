<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PostCode implements Rule {

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value) {
        $response = guzzleGet(
                ['Content-Type' => 'application/json'],
                getenv('POST_CODE_CHECK_URL') . $value . '/validate'
        );

        return $response['status'] ? $response['response']['result'] : false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message() {
        return 'Invalid Postcode';
    }

}
