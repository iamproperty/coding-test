<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PostCode implements Rule
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
        try {
            $url = Str::replaceFirst(':postcode', $value, Config::get('services.postcode.validate_url'));
            $response = Http::get($url);
            if ($response->ok()) {
                return $response->json()['result'];
            }
        } catch (\Exception $exc) {
            Log::alert("Failed to validate post code.", [
                'validation_url' => $url,
                'error_message'  => $exc->getMessage()
            ]);
        }

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('validation.postcode');
    }
}
