<?php

namespace Tatdev\DPMSClient\Traits;

use Tatdev\DPMSClient\Exceptions\HttpException;
use Tatdev\DPMSClient\Interfaces\iHttpClient;

/**
 * Trait SmsHandler
 *
 * @property iHttpClient $httpClient
 * @property string $prefixUrl
 * @property array $headers
 *
 * @package Tatdev\DPMSClient\Traits
 */
trait SmsHandler
{
    /**
     * @param array $data
     * @return array
     *
     * @throws HttpException
     * @throws \Exception
     */
    public function sendSms(array $data)
    {
        $response = $this->httpClient->sendRequestJson(
            'POST',
            $this->prefixUrl . '/orders/sms',
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
    public function sendSmsMultiple(array $data)
    {
        $response = $this->httpClient->sendRequestJson(
            'POST',
            $this->prefixUrl . '/orders/sms/multiple',
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