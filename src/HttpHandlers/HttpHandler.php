<?php

namespace Tatdev\DPMSClient\HttpHandlers;

use makbari\httpClient\interfaces\iHttpClient;
use Tatdev\DPMSClient\Traits\SmsHandler;

/**
 * Class HttpHandler
 *
 * @property iHttpClient $httpClient
 * @property string $prefixUrl
 * @property array $headers
 *
 * @package Tatdev\DPMSClient\HttpHandlers
 */
class HttpHandler
{
    private $httpClient;
    private $prefixUrl;
    private $headers = [
        'Accept' => 'application/json',
        'Accept-Language' => 'fa'
    ];

    /**
     * SmsHandler constructor.
     * @param string $prefixUrl
     * @param iHttpClient $httpClient .
     */
    public function __construct(iHttpClient $httpClient, string $prefixUrl = '')
    {
        $this->httpClient = $httpClient;
        $this->prefixUrl = $prefixUrl;
    }

    use SmsHandler;
}