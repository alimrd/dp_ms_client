<?php

namespace Tatdev\DPMSClient\Objects;

use Tatdev\DPMSClient\Abstracts\ObjectAbstract;

/**
 * @property int $id
 * @property string $type
 * @property string $value
 * @property string $provider
 * @property string $description
 *
 * Class SenderObject
 * @package Tatdev\DPMSClient\Objects
 */
class SenderObject extends ObjectAbstract
{
    protected $properties = [
        'id' => [
            'type' => 'int',
            'nullable' => false
        ],
        'type' => [
            'type' => 'string',
            'nullable' => false
        ],
        'value' => [
            'type' => 'string',
            'nullable' => false
        ],
        'provider' => [
            'type' => 'string',
            'nullable' => false
        ],
        'description' => [
            'type' => 'string',
            'nullable' => false
        ]
    ];
}