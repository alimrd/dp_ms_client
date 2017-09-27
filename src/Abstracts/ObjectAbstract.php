<?php

namespace Tatdev\DPMSClient\Abstracts;

use Tatdev\DPMSClient\Exceptions\PropertiesIsIncompleteException;
use Tatdev\DPMSClient\Objects\OrderObject;
use Tatdev\DPMSClient\Objects\SenderObject;
use Tatdev\DPMSClient\Objects\SentEmailObject;
use Tatdev\DPMSClient\Objects\SentSmsObject;
use Tatdev\DPMSClient\Objects\TemplateObject;
use Tatdev\DPMSClient\Objects\TimeObject;
use Tatdev\DPMSClient\Objects\TimezoneObject;

/**
 * Class ObjectAbstract
 * @package Tatdev\DPMSClient\Abstracts
 */
abstract class ObjectAbstract
{
    protected $properties;

    /**
     * ObjectAbstract constructor.
     * @param array $attributes
     * @throws PropertiesIsIncompleteException
     */
    public function __construct(array $attributes)
    {
        foreach ($this->properties as $key => $property)
            if (key_exists($key, $attributes)) {
                if ($property['nullable'] && is_null($attributes[$key])) {
                    $this->$key = null;
                } else {
                    switch ($property['type']) {
                        case 'int':
                            $this->$key = (int)$attributes[$key];
                            break;
                        case 'string':
                            $this->$key = (string)$attributes[$key];
                            break;
                        case 'order':
                            $this->$key = OrderObject::fromArray($attributes[$key]);
                            break;
                        case 'sender':
                            $this->$key = SenderObject::fromArray($attributes[$key]);
                            break;
                        case 'sent_email':
                            $this->$key = SentEmailObject::fromArray($attributes[$key]);
                            break;
                        case 'sent_sms':
                            $this->$key = SentSmsObject::fromArray($attributes[$key]);
                            break;
                        case 'time':
                            $this->$key = TimeObject::fromArray($attributes[$key]);
                            break;
                        case 'template':
                            $this->$key = TemplateObject::fromArray($attributes[$key]);
                            break;
                        case 'timezone':
                            $this->$key = TimezoneObject::fromArray($attributes[$key]);
                            break;
                    }
                }
            } else {
                if (!$property['nullable'])
                    throw new PropertiesIsIncompleteException();
                $this->$key = null;
            }
    }

    /**
     * @param array $properties
     *
     * @return static
     */
    public static function fromArray(array $properties)
    {
        return new static($properties);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $array = array();
        foreach ($this->properties as $key => $property)
            if (is_object($this->properties[$key]))
                $array[$key] = $this->$key->toArray();
            else
                $array[$key] = $this->$key;
        return $array;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return json_encode($this->toArray());
    }
}