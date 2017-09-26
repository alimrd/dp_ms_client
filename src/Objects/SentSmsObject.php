<?php

namespace Tatdev\DPMSClient\Objects;

use Tatdev\DPMSClient\Abstracts\ObjectAbstract;

/**
 * @property int $id
 * @property string $to
 * @property string $body
 * @property TemplateObject|null $template
 * @property OrderObject $order
 * @property TimeObject|null $stopped_time
 * @property string $status
 * @property string|null $error_message
 * @property string|null $provider_message
 * @property int $cost
 * @property TimeObject|null $sent_time
 * @property TimeObject|null $delivered_time
 * @property TimeObject $created_time
 * @property TimeObject $updated_time
 *
 * Class SentSmsObject
 * @package Tatdev\DPMSClient\Objects
 */
class SentSmsObject extends ObjectAbstract
{
    protected $properties = [
        'id' => [
            'type' => 'int',
            'nullable' => false
        ],
        'to' => [
            'type' => 'string',
            'nullable' => false
        ],
        'body' => [
            'type' => 'string',
            'nullable' => false
        ],
        'template' => [
            'type' => 'template',
            'nullable' => true
        ],
        'order' => [
            'type' => 'order',
            'nullable' => false
        ],
        'status' => [
            'type' => 'string',
            'nullable' => false
        ],
        'error_message' => [
            'type' => 'string',
            'nullable' => true
        ],
        'provider_message' => [
            'type' => 'string',
            'nullable' => true
        ],
        'cost' => [
            'type' => 'int',
            'nullable' => false
        ],
        'sent_time' => [
            'type' => 'time',
            'nullable' => true
        ],
        'delivered_time' => [
            'type' => 'time',
            'nullable' => true
        ],
        'created_time' => [
            'type' => 'time',
            'nullable' => false
        ],
        'updated_time' => [
            'type' => 'time',
            'nullable' => false
        ]
    ];
}