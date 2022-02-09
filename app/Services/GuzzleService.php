<?php

/**
 * User: KholoudElkholy
 * Email: kholoudelkholy91@gmail.com
 */

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GuzzleService
{
    /**
     * @param $pUrl
     * @param null $pHeader
     * @param null $pOptions
     * @return array|\Illuminate\Http\Client\Response
     */
    public static function getRequest($pUrl, $pHeader = null, $pOptions = null)
    {
        try {
            if ($pHeader != null) {
                $response = Http::withHeaders($pHeader)->get($pUrl, $pOptions);
            } else {
                $response = Http::get($pUrl, $pOptions);
            }
            return [
                'response' => json_decode(
                    $response->body(),
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
    
    /**
     * @param $pUrl
     * @param null $pHeader
     * @param null $pOptions
     * @return \Illuminate\Http\Client\Response|string
     */
    public static function postRequest($pUrl,  $pHeader = null,$pOptions = null)
    {
        try {
            if ($pHeader == null) {
                $response = Http::post($pUrl);

            } else {
                $response = Http::withHeaders($pHeader)->post($pUrl, $pOptions);
                return $response;
            }
            return $response;
        } catch (\Exception $ex) {
            return json_encode(['error' => true, 'response' => null]);
        }
    }


    /**
     * @param $pUrl
     * @param null $pOptions
     * @return array|\Illuminate\Http\Client\Response
     */
    public static function patchRequest($pUrl, $pOptions = null)
    {
        try {
            if ($pOptions == null) {
                $response = Http::patch($pUrl);

            } else {
                $response = Http::patch($pUrl, $pOptions);
            }
            return $response;
        } catch (\Exception $ex) {
            return ['error' => true, 'response' => null];
        }
    }
}