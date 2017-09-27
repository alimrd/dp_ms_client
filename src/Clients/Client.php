<?php

namespace Tatdev\DPMSClient\Clients;

use Tatdev\DPMSClient\HttpHandlers\HttpHandler;
use Tatdev\DPMSClient\Interfaces\iHttpClient;
use Tatdev\DPMSClient\Traits\EmailClient;
use Tatdev\DPMSClient\Traits\SmsClient;

/**
 * Class Client
 *
 * @property HttpHandler $httpHandler
 *
 * @package Tatdev\DPMSClient\Clients
 */
class Client
{
    private $httpHandler;

    /**
     * Client constructor.
     *
     * @param iHttpClient $httpClient
     * @param string $prefixUrl
     */
    public function __construct(iHttpClient $httpClient, string $prefixUrl = '')
    {
        $this->httpHandler = new HttpHandler($httpClient, $prefixUrl);
    }

    private function filter($array)
    {
        $arr = array();
        $_arr = is_object($array) ? get_object_vars($array) : $array;
        foreach ($_arr as $key => $val) {
            if (is_null($val) || empty($val))
                continue;
            $val = (is_array($val) || is_object($val)) ? $this->filter($val) : $val;
            $arr[$key] = $val;
        }
        return $arr;
    }

    use SmsClient;
    use EmailClient;
}