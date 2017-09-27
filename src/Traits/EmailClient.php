<?php

namespace Tatdev\DPMSClient\Traits;

use Tatdev\DPMSClient\Exceptions\ParametersIsIncompleteException;
use Tatdev\DPMSClient\HttpHandlers\HttpHandler;
use Tatdev\DPMSClient\Objects\OrderObject;
use Tatdev\DPMSClient\SendObjects\SingleEmail;
use Tatdev\DPMSClient\SendObjects\Value;

/**
 * Trait EmailClient
 *
 * @property HttpHandler $httpHandler
 *
 * @package Tatdev\DPMSClient\Traits
 */
trait EmailClient
{
    /**
     * send email with same body to multiple receptors
     *
     * @param int $sender
     * @param array $receptors
     * @param string $subject
     * @param string|null $body
     * @param int|null $template
     * @param Value[] $values
     * @param array $cc
     * @param array $bcc
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
    public function sendEmail(
        int $sender,
        array $receptors,
        string $subject,
        string $body = null,
        int $template = null,
        array $values = [],
        array $cc = [],
        array $bcc = [],
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
            throw new ParametersIsIncompleteException('email must be have body or template');
        if ($j_due_date && is_null($j_date_format))
            throw new ParametersIsIncompleteException('due date must be have date format');
        $data = [
            'sender' => $sender,
            'subject' => $subject,
            'body' => $body,
            'template' => $template,
            'values' => $values,
            'cc' => $cc,
            'bcc' => $bcc,
            'receptors' => $receptors,
            'accept_latency' => $accept_latency,
            'retry_count' => $retry_count,
            'status_wait_time' => $status_wait_time,
            'status_try_count' => $status_try_count,
            'j_date_format' => $j_date_format,
            'j_due_date' => $j_due_date
        ];
        $data = $this->filter($data);
        $order = OrderObject::fromArray($this->httpHandler->sendEmail($data));
        if ($return_array)
            return $order->toArray();
        return $order;
    }

    /**
     * send email with multiple body to multiple receptors
     *
     * @param int $sender
     * @param SingleEmail[] $emails
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
    public function sendEmailMultiple(
        int $sender,
        array $emails,
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
            'data' => $emails,
            'accept_latency' => $accept_latency,
            'retry_count' => $retry_count,
            'status_wait_time' => $status_wait_time,
            'status_try_count' => $status_try_count,
            'j_date_format' => $j_date_format,
            'j_due_date' => $j_due_date
        ];
        $data = $this->filter($data);
        $order = OrderObject::fromArray($this->httpHandler->sendEmailMultiple($data));
        if ($return_array)
            return $order->toArray();
        return $order;
    }
}
