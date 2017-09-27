<?php

namespace Tatdev\DPMSClient\Interfaces;

use Tatdev\DPMSClient\Exceptions\HttpException;

/**
 * Class iHttpClient
 * @package Tatdev\DPMSClient\Interfaces
 */
interface iHttpClient
{
    /**
     * @param string $method
     * @param string $uri
     * @param array $data
     * @param array $headers
     * @param array $queryParams
     * @return array
     *
     * @throws HttpException
     */
    public function sendRequestJson($method = 'GET', $uri, $data = [], $headers = [], $queryParams = []);
}