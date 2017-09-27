<?php

namespace Tatdev\DPMSClient\SendObjects;


use Tatdev\DPMSClient\Exceptions\ParametersIsIncompleteException;

class SingleEmail
{
    public $receptor;
    public $subject;
    public $body;
    public $template;
    public $values;
    public $cc;
    public $bcc;

    /**
     * SingleEmail constructor.
     * @param string $receptor
     * @param string $subject
     * @param string|null $body
     * @param string|null $template
     * @param Value[] $values
     * @param array $cc
     * @param array $bcc
     *
     * @throws ParametersIsIncompleteException
     */
    public function __construct($receptor, $subject, $body = null, $template = null, $values = [], $cc = [], $bcc = [])
    {
        if (is_null($body) && is_null($template))
            throw new ParametersIsIncompleteException('single email must be have body or template');
        $this->receptor = $receptor;
        $this->subject = $subject;
        $this->body = $body;
        $this->template = $template;
        $this->values = $values;
        $this->cc = $cc;
        $this->bcc = $bcc;
    }
}