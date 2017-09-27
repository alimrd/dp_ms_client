<?php

namespace Tatdev\DPMSClient\Traits;

use Tatdev\DPMSClient\Exceptions\ParametersIsIncompleteException;
use Tatdev\DPMSClient\HttpHandlers\HttpHandler;
use Tatdev\DPMSClient\Objects\OrderObject;
use Tatdev\DPMSClient\SendObjects\SingleMessage;
use Tatdev\DPMSClient\SendObjects\Value;

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
     * send sms with same body to multiple receptors
     *
     * @param int $sender
     * @param string|null $body
     * @param int|null $template
     * @param Value[] $values
     * @param array $receptors
     * @param int $accept_latency
     * @param int $retry_count
     * @param int $status_wait_time
     * @param int $status_try_count
     * @param string|null $j_date_format
     * @param string|null $j_due_date
     * @param bool $return_array
     *
     * @return array|OrderObject
     *
     * @throws ParametersIsIncompleteException
     */
    public function sendSms(
        int $sender,
        array $receptors,
        string $body = null,
        int $template = null,
        array $values = [],
        int $accept_latency = 24 * 60 * 60,
        int $retry_count = 3,
        int $status_wait_time = 60,
        int $status_try_count = 24 * 60,
        string $j_date_format = null,
        string $j_due_date = null,
        bool $return_array = false
    )
    {
        if (is_null($body) && is_null($template))
            throw new ParametersIsIncompleteException('sms must be have body or template');
        if ($j_due_date && is_null($j_date_format))
            throw new ParametersIsIncompleteException('due date must be have date format');
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
            'j_due_date' => $j_due_date
        ];
        $data = array_filter($data, function ($value) {
            return !is_null($value);
        });
        $data = $this->objectToArray($data);
        $order = OrderObject::fromArray($this->httpHandler->sendSms($data));
        if ($return_array)
            return $order->toArray();
        return $order;
    }

    /**
     * send sms with multiple body to multiple receptors
     *
     * @param int $sender
     * @param SingleMessage[] $messages
     * @param int $accept_latency
     * @param int $retry_count
     * @param int $status_wait_time
     * @param int $status_try_count
     * @param string|null $j_date_format
     * @param string|null $j_due_date
     * @param bool $return_array
     *
     * @return array|OrderObject
     *
     * @throws ParametersIsIncompleteException
     */
    public function sendSmsMultiple(
        int $sender,
        array $messages,
        int $accept_latency = 24 * 60 * 60,
        int $retry_count = 3,
        int $status_wait_time = 60,
        int $status_try_count = 24 * 60,
        string $j_date_format = null,
        string $j_due_date = null,
        bool $return_array = false
    )
    {
        if ($j_due_date && is_null($j_date_format))
            throw new ParametersIsIncompleteException('due date must be have date format');
        $data = [
            'sender' => $sender,
            'data' => $messages,
            'accept_latency' => $accept_latency,
            'retry_count' => $retry_count,
            'status_wait_time' => $status_wait_time,
            'status_try_count' => $status_try_count,
            'j_date_format' => $j_date_format,
            'j_due_date' => $j_due_date
        ];
        $data = $this->filter($data);
        $order = OrderObject::fromArray($this->httpHandler->sendSmsMultiple($data));
        if ($return_array)
            return $order->toArray();
        return $order;
    }
}
