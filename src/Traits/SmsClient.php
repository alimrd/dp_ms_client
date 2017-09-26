<?php

namespace Tatdev\DPMSClient\Traits;

use Tatdev\DPMSClient\HttpHandlers\HttpHandler;
use Tatdev\DPMSClient\Objects\OrderObject;

/**
 * Trait SmsClient
 *
 * @property HttpHandler $httpHandler
 *
 * @package Tatdev\DPMSClient\Traits
 */
trait SmsClient
{
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
     * @param string|null $j_date_format
     * @param string|null $j_due_date
     * @param bool $return_array
     * @return \Tatdev\DPMSClient\Objects\OrderObject|array
     */
    public function sendSms(
        int $sender,
        string $body = null,
        int $template = null,
        array $values = [],
        array $receptors,
        int $accept_latency = 24 * 60 * 60,
        int $retry_count = 3,
        int $status_wait_time = 60,
        int $status_try_count = 24 * 60,
        string $j_date_format = 'Y/m/d H:i:s',
        string $j_due_date = null,
        bool $return_array = false
    )
    {
        $data = [
            'sender' => $sender,
            'body' => $body,
            'template' => $template,
            'values' => $values,
            'receptors' => $receptors,
            'accept_latency' => $accept_latency,
            'retry_count' => $retry_count,
            'status_wait_time' => $status_wait_time,
            'status_try_count' => $status_try_count,
            'j_date_format' => $j_date_format,
            'j_due_date' => $j_due_date,
            'return_array' => $return_array
        ];
        $data = array_filter($data, function ($value) {
            return !is_null($value);
        });
        $response = $this->httpHandler->sendSms($data);
        $order = OrderObject::fromArray($response['result']);
        if ($return_array)
            return $order->toArray();
        return $order;
    }
}
