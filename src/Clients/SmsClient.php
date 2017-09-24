<?php

namespace Tatdev\DPMSClient\Clients;


use makbari\httpClient\interfaces\iHttpClient;
use Tatdev\DPMSClient\HttpHandlers\SmsHandler;

class SmsClient
{
    private $httpHandler;

    /**
     * SmsClient constructor.
     * @param iHttpClient $httpClient
     */
    public function __construct(iHttpClient $httpClient)
    {
        $this->httpHandler = new SmsHandler($httpClient);
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
     * @param bool $return_array
     * @return \Tatdev\DPMSClient\Objects\OrderObject
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
        int $status_try_count = 24 * 60,
        bool $return_array = false
    )
    {
        $order = $this->httpHandler->SendMessage($sender,$body,$template,$values,$receptors,$accept_latency
            ,$retry_count,$status_wait_time,$status_try_count);
        if ($return_array)
            $order = $order->toArray();
        return $order;
    }
}