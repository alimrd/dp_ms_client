<?php

namespace Tatdev\DPMSClient\Traits;

use Tatdev\DPMSClient\Exceptions\HttpException;
use Tatdev\DPMSClient\Interfaces\iHttpClient;

/**
 * Trait EmailHandler
 *
 * @property iHttpClient $httpClient
 * @property string $prefixUrl
 * @property array $headers
 *
 * @package Tatdev\DPMSClient\Traits
 */
trait EmailHandler
{
    /**
     * @param array $data
     * @return array
     *
     * @throws HttpException
     * @throws \Exception
     */
    public function sendEmail(array $data)
    {
        $response = $this->httpClient->sendRequestJson(
            'POST',
            $this->prefixUrl . '/orders/emails',
            $data,
            array_merge($this->headers)
        );
        if (!isset($response['status']))
            throw new HttpException('Wrong response from messaging service');
        if ($response['status']['code'] > 300)
            throw new HttpException($response['status']['message']);
        return $response['result'];
    }

    /**
     * @param array $data
     * @return array
     *
     * @throws HttpException
     * @throws \Exception
     */
    public function sendEmailMultiple(array $data)
    {
        $response = $this->httpClient->sendRequestJson(
            'POST',
            $this->prefixUrl . '/orders/emails/multiple',
            $data,
            array_merge($this->headers)
        );
        if (!isset($response['status']))
            throw new HttpException('Wrong response from messaging service');
        if ($response['status']['code'] > 300)
            throw new HttpException($response['status']['message']);
        return $response['result'];
    }
}