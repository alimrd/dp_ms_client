<?php

namespace Tatdev\DPMSClient\HttpClients;

use Tatdev\DPMSClient\Exceptions\HttpException;
use Tatdev\DPMSClient\Interfaces\iHttpClient;

/**
 * Class CurlHttpClient
 * @package Tatdev\DPMSClient\HttpClients
 */
class CurlHttpClient implements iHttpClient
{
    /**
     * @param string $method
     * @param string $uri
     * @param array $data
     * @param array $headers
     * @param array $queryParams
     *
     * @return array
     *
     * @throws HttpException
     */
    public function sendRequestJson($method = 'GET', $uri, $data = [], $headers = [], $queryParams = [])
    {
        if (count($queryParams))
            $uri = $this->setQueryParams($uri, $queryParams);
        $data_json = json_encode($data);
        $headers = array_merge($headers, [
            'Content-Type: application/json'
        ]);

        $curl = curl_init($uri);
        $curl = $this->setCurlMethod($method, $curl);
        if (count($data))
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data_json);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = json_decode(curl_exec($curl),true);
        if (curl_errno($curl)) {
            throw new HttpException(curl_error($curl));
        } else {
            return $response;
        }
    }


    /**
     * @param string $method
     * @param $curl
     * @return $curl
     */
    private function setCurlMethod(string $method, $curl)
    {
        switch ($method) {
            case 'GET':
                curl_setopt($curl, CURLOPT_HTTPGET, true);
                break;
            case 'POST':
                curl_setopt($curl, CURLOPT_POST, true);
                break;
            case 'PATCH':
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PATCH');
                break;
            case 'PUT':
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
                break;
            case 'DELETE':
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
                break;
        }
        return $curl;
    }

    /**
     * @param array $queries
     * @param string $uri
     * @return string
     */
    private function setQueryParams($uri, array $queries = [])
    {
        if (!empty($queries)) {
            foreach ($queries as $key => $value) {
                if (is_string($value)) {
                    if ($this->contains($uri, '?')) {
                        $uri .= '&' . $key . '=' . $value;
                    } else {
                        $uri .= '?' . $key . '=' . $value;
                    }
                }
                if (is_array($value)) {
                    foreach ($value as $v) {
                        if ($this->contains($uri, '?')) {
                            $uri .= '&' . $key . '[]=' . $v;
                        } else {
                            $uri .= '?' . $key . '[]=' . $v;
                        }
                    }
                }
            }
        }
        return $uri;
    }


    /**
     * Determine if a given string contains a given substring.
     *
     * @param  string $haystack
     * @param  string|array $needles
     * @return bool
     */
    private function contains($haystack, $needles)
    {
        foreach ((array)$needles as $needle) {
            if ($needle != '' && mb_strpos($haystack, $needle) !== false) {
                return true;
            }
        }
        return false;
    }
}