<?php

namespace Tatdev\DPMSClient\Objects;

use Tatdev\DPMSClient\Abstracts\ObjectAbstract;

/**
 * @property int $id
 * @property SenderObject $sender
 * @property string $type
 * @property TimeObject $created_time
 * @property TimeObject|null $due_time
 * @property TimeObject|null $stopped_time
 * @property int $retry_count
 * @property int $status_wait_time
 * @property int $status_try_count
 * @property int $sent_count
 * @property int $not_sent_count
 * @property int $cost
 *
 * Class OrderObject
 * @package Tatdev\DPMSClient\Objects
 */
class OrderObject extends ObjectAbstract
{
    protected $properties = [
        'id' => [
            'type' => 'int',
            'nullable' => false
        ],
        'sender' => [
            'type' => 'sender',
            'nullable' => false
        ],
        'type' => [
            'type' => 'string',
            'nullable' => false
        ],
        'created_time' => [
            'type' => 'time',
            'nullable' => false
        ],
        'due_time' => [
            'type' => 'time',
            'nullable' => true
        ],
        'stopped_time' => [
            'type' => 'time',
            'nullable' => true
        ],
        'retry_count' => [
            'type' => 'int',
            'nullable' => false
        ],
        'status_wait_time' => [
            'type' => 'int',
            'nullable' => false
        ],
        'status_try_count' => [
            'type' => 'int',
            'nullable' => false
        ],
        'sent_count' => [
            'type' => 'int',
            'nullable' => false
        ],
        'not_sent_count' => [
            'type' => 'int',
            'nullable' => false
        ],
        'cost' => [
            'type' => 'int',
            'nullable' => false
        ]
    ];
}