<?php

namespace Tatdev\DPMSClient\SendObjects;

/**
 * Class Value
 * @package Tatdev\DPMSClient\SendObjects
 */
class Value
{
    private $key;
    private $value;

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