<?php

namespace Tatdev\DPMSClient\Interfaces;

/**
 * Interface iSmsHandler
 * @package Tatdev\DPMSClient\Interfaces
 */
interface iSmsHandler
{
    /**
     * @param int $sender
     * @param string|null $body
     * @param int|null $template
     * @param array $values
     * @param array $receptors
     * @param int $accept_latency
     * @param int $retry_count
     * @param int $status_wait_time
     * @param int $status_try_count
     */
    public function sendMessage($sender,$body,$template,$values,$receptors,$accept_latency,$retry_count,$status_wait_time,$status_try_count);
}