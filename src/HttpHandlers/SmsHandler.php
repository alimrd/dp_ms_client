<?php
/**
 * Created by PhpStorm.
 * User: moradi
 * Date: 9/24/17
 * Time: 12:28 PM
 */

namespace Tatdev\DPMSClient\HttpHandlers;

use makbari\httpClient\exception\ClientException;
use makbari\httpClient\interfaces\iHttpClient;
use Tatdev\DPMSClient\Exceptions\HttpException;
use Tatdev\DPMSClient\Objects\OrderObject;

/**
 * Class SmsHandler
 * @package Tatdev\DPMSClient\HttpHandlers
 */
class SmsHandler
{
    private $httpClient;
    private $prefix_url;
    private $endpoints = [
        'sendMessage' => '/orders/sms'
    ];

    /**
     * SmsHandler constructor.
     * @param string $prefix_url
     * @param iHttpClient $httpClient .
     */
    public function __construct(iHttpClient $httpClient, string $prefix_url = '')
    {
        $this->httpClient = $httpClient;
        $this->prefix_url = $prefix_url;
    }

    /**
     * @param int $sender
     * @param string|null $body
     * @param int|null $template
     * @param array $values
     * @param array $receptors
     * @param int $accept_latency
     * @param int $retry_count
     * @param int $status_wait_time
     * @param int $status_try_count
     *
     * @return OrderObject
     *
     * @throws HttpException
     * @throws \Exception
     */
    public function sendMessage(
        int $sender,
        string $body = null,
        int $template = null,
        array $values = [],
        array $receptors,
        int $accept_latency = 24 * 60 * 60,
        int $retry_count = 3,
        int $status_wait_time = 60,
        int $status_try_count = 24 * 60
    )
    {
        try {
            $response = $this->httpClient->sendRequest(
                'POST',
                $this->prefix_url . $this->endpoints['sendMessage'],
                json_encode([
                    'sender' => $sender,
                    'body' => $body,
                    'template' => $template,
                    'values' => $values,
                    'receptors' => $receptors,
                    'accept_latency' => $accept_latency,
                    'retry_count' => $retry_count,
                    'status_wait_time' => $status_wait_time,
                    'status_try_count' => $status_try_count
                ]),
                [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                    'Accept-Language' => 'fa',
                ]
            );
        } catch (ClientException $exception) {
            throw new HttpException($exception->getMessage());
        } catch (\Exception $exception) {
            throw $exception;
        }
        return OrderObject::fromArray($response['result']);
    }
}