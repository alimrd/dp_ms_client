<?php

namespace Tatdev\DPMSClient\Objects;

use Tatdev\DPMSClient\Abstracts\ObjectAbstract;

/**
 * @property string $date
 * @property int $timestamp
 * @property TimezoneObject $timezone
 * @property string $preview
 *
 * Class TimeObject
 * @package Tatdev\DPMSClient\Objects
 */
class TimeObject extends ObjectAbstract
{
    protected $properties = [
        'date' => [
            'type' => 'string',
            'nullable' => false
        ],
        'timestamp' => [
            'type' => 'int',
            'nullable' => false
        ],
        'timezone' => [
            'type' => 'timezone',
            'nullable' => false
        ],
        'preview' => [
            'type' => 'string',
            'nullable' => false
        ]
    ];
}