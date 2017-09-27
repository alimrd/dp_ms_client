<?php

namespace Tatdev\DPMSClient\SendObjects;

/**
 * Class Value
 * @package Tatdev\DPMSClient\SendObjects
 */
class Value
{
    public $key;
    public $value;

    /**
     * Value constructor.
     * @param string $key
     * @param string $value
     */
    public function __construct($key,$value)
    {
        $this->key = $key;
        $this->value = $value;
    }
}