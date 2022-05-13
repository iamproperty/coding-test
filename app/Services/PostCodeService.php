<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class PostCodeService
{
    private $postcodeApis;

    public function __construct()
    {
        $this->postcodeApis = config('services.postCodeApi');
    }

    public function lookup($postcode): ?object
    {
        $url = $this->getUrl($postcode, 'lookup');

        $response = Http::get($url);
        if ($response->ok()) {
            return $response->object();
        }

        return null;
    }

    public function validate($postcode): ?object
    {
        $url = $this->getUrl($postcode, 'validate');

        $response = Http::get($url);
        if ($response->ok()) {
            return $response->object();
        }

        return null;
    }

    private function getUrl($postcode, $function): string
    {
        return Str::replaceFirst('{postcode}', $postcode, $this->postcodeApis[$function]);
    }
}
