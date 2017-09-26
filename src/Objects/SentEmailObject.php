<?php

namespace Tatdev\DPMSClient\Objects;

use Tatdev\DPMSClient\Abstracts\ObjectAbstract;

/**
 * @property int $id
 * @property string $to
 * @property string $subject
 * @property string|null $body
 * @property TemplateObject|null $template
 * @property OrderObject $order
 * @property string $cc
 * @property string $bcc
 * @property string $status
 * @property string|null $error_message
 * @property TimeObject|null $sent_time
 * @property TimeObject $created_time
 * @property TimeObject $updated_time
 *
 * Class SentEmailObject
 * @package Tatdev\DPMSClient\Objects
 */
class SentEmailObject extends ObjectAbstract
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
        'subject' => [
            'type' => 'string',
            'nullable' => false
        ],
        'body' => [
            'type' => 'string',
            'nullable' => true
        ],
        'template' => [
            'type' => 'template',
            'nullable' => true
        ],
        'order' => [
            'type' => 'order',
            'nullable' => false
        ],
        'cc' => [
            'type' => 'string',
            'nullable' => false
        ],
        'bcc' => [
            'type' => 'string',
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
        'sent_time' => [
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