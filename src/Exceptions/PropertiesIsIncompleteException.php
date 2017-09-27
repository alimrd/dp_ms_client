<?php

namespace Tatdev\DPMSClient\Exceptions;

use Throwable;

/**
 * Class PropertiesIsIncompleteException
 * @package Tatdev\DPMSClient\Exceptions
 */
class PropertiesIsIncompleteException extends \Exception
{
    public function __construct($message = "Response properties is incomplete", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}