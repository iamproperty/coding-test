<?php

namespace App\Services\validations;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

/**
 * Class ValidatingPostCodeService
 * @package App\Services\validations
 * @author Ahmed Helal Ahmed
 */
class ValidatingPostCodeService
{
    const END_POINT_PART1 = 'https://api.postcodes.io/postcodes/';
    const END_POINT_PART2 = '/validate';

    public function execute(string $postcode): bool
    {
        $response = Http::get(self::END_POINT_PART1 . $postcode . self::END_POINT_PART2)->json();

        return Arr::get($response, 'result');
    }
}
