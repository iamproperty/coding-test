<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PostcodeApi extends Controller
{
    public function validatePostcode(String $postcode)
    {
        $client = new Client();
        $uri= 'https://api.postcodes.io/postcodes/'. $postcode;
        $response = $client->get($uri);
        $statusCode = $response->getStatusCode();
        $body = $response->getBody()->getContents();

        return $body;
    }
}
