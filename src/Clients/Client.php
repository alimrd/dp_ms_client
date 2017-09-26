<?php

namespace Tatdev\DPMSClient\Clients;


use makbari\httpClient\interfaces\iHttpClient;
use Tatdev\DPMSClient\HttpHandlers\HttpHandler;
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
     * SmsClient constructor.
     * @param iHttpClient $httpClient
     */
    public function __construct(iHttpClient $httpClient)
    {
        $this->httpHandler = new HttpHandler($httpClient);
    }

    use SmsClient;
}