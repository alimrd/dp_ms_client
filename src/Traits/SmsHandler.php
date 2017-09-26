<?php

namespace Tatdev\DPMSClient\Traits;

use makbari\httpClient\exception\ClientException;
use makbari\httpClient\interfaces\iHttpClient;
use Tatdev\DPMSClient\Exceptions\HttpException;

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
        try {
            $response = $this->httpClient->sendRequest(
                'POST',
                $this->prefixUrl . '/orders/sms',
                json_encode($data),
                $this->headers
            );
        } catch (ClientException $exception) {
            throw new HttpException($exception->getMessage());
        } catch (\Exception $exception) {
            throw $exception;
        }
        return json_decode($response->getBody(), true);
    }
}