<?php

use GuzzleHttp\Client;

if (!function_exists('guzzleGet')) {

    /**
     * @param array $headers
     * @param string $uri
     * @param array $options
     * @return array
     */
    function guzzleGet(array $headers, string $uri, array $options = []): array {
        try {
            $client = new Client(['headers' => $headers]);
            $response = $client->get($uri, $options);

            return [
                'response' => json_decode(
                        $response->getBody()->getContents(),
                        true
                ),
                'status' => true
            ];
        } catch (\Exception $exception) {
            return [
                'response' => ['message' => $exception->getMessage()],
                'status' => false
            ];
        }
    }

}