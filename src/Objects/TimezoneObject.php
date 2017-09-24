<?php

namespace Tatdev\DPMSClient\Objects;

use Tatdev\DPMSClient\Abstracts\ObjectAbstract;

/**
 * @property int $timezone_type
 * @property string $timezone
 *
 * Class TimezoneObject
 * @package Tatdev\DPMSClient\Objects
 */
class TimezoneObject extends ObjectAbstract
{
    protected $properties = [
        'timezone' => [
            'type' => 'string',
            'nullable' => false
        ],
        'timezone_type' => [
            'type' => 'int',
            'nullable' => false
        ]
    ];
}