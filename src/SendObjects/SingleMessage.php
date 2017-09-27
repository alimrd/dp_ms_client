<?php

namespace Tatdev\DPMSClient\SendObjects;


use Tatdev\DPMSClient\Exceptions\ParametersIsIncompleteException;

class SingleMessage
{
    public $receptor;
    public $body;
    public $template;
    public $values;

    /**
     * SingleMessage constructor.
     * @param string $receptor
     * @param string|null $body
     * @param string|null $template
     * @param Value[] $values
     *
     * @throws ParametersIsIncompleteException
     */
    public function __construct($receptor, $body = null, $template = null, $values = [])
    {
        if (is_null($body) && is_null($template))
            throw new ParametersIsIncompleteException('single message must be have body or template');
        $this->receptor = $receptor;
        $this->body = $body;
        $this->template = $template;
        $this->values = $values;
    }
}