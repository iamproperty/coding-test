<?php

namespace App\Rules;

use Exception;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Config;

class PostCode implements Rule {

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        try {
            $url = Str::replaceFirst(':postcode', $value, Config::get('services.post_code_api.validate_url'));
            $response = Http::get($url);
            if ($response->ok()) {
                return true;
                return $response->json()['result'];
            }
        } catch (Exception $exc) {
            Log::error("Failed to validate post code.", [
                'message'  => $exc->getMessage(),
                'code'=> $value
            ]);
        }

        return false;
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
