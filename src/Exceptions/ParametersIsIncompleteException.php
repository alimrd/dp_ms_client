<?php

namespace Tatdev\DPMSClient\Exceptions;

use Throwable;

/**
 * Class ParametersIsIncompleteException
 * @package Tatdev\DPMSClient\Exceptions
 */
class ParametersIsIncompleteException extends \Exception
{
    public function __construct($message = "Request parameters is incomplete", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}