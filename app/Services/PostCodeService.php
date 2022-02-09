<?php
/**
 * User: kholoudElkholy
 * Email: kholoudelkholy91@gmail.com
 */

namespace App\Services;

class PostCodeService
{

    /**
     * PostCodeService constructor.
     */
    public function __construct()
    {
        $this->config = config('postCode');
        $this->post_code_valid_url = $this->config['post_code_valid_url'];
        $this->guzzleService = new  GuzzleService();
    }

    /**
     * @param $pValue
     * @return string
     */
    private function getValidateUrl($pValue)
    {
        return $this->post_code_valid_url . '/' . $pValue . '/validate';
    }

    /**
     * @param $pValue
     * @return array|bool|\Illuminate\Http\Client\Response|mixed
     */
    public function validate($pValue)
    {
        $url = $this->getValidateUrl($pValue);
        $response = $this->guzzleService->getRequest($url, ['Content-Type' => 'application/json']);
        return $response['status'] ? $response['response']['result'] : false;
    }
}