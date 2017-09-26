<?php

namespace Tatdev\DPMSClient\Objects;

use Tatdev\DPMSClient\Abstracts\ObjectAbstract;

/**
 * @property int $id
 * @property string|null $name
 * @property string $text_html
 * @property string $type
 *
 * Class TemplateObject
 * @package Tatdev\DPMSClient\Objects
 */
class TemplateObject extends ObjectAbstract
{
    protected $properties = [
        'id' => [
            'type' => 'int',
            'nullable' => false
        ],
        'name' => [
            'type' => 'string',
            'nullable' => true
        ],
        'text_html' => [
            'type' => 'string',
            'nullable' => false
        ],
        'type' => [
            'type' => 'string',
            'nullable' => false
        ]
    ];
}