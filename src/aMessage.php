<?php

namespace mhndev\messaging;
use mhndev\messaging\interfaces\iMessage;

/**
 * Class aMessage
 * @package mhndev\messaging
 */
abstract class aMessage implements iMessage
{

    /**
     * @var
     */
    protected $endPoint;

    /**
     * @var
     */
    protected $body;


    /**
     * Message constructor.
     * @param $endPoint
     * @param $body
     */
    public function __construct($endPoint, $body)
    {
        $this->endPoint = $endPoint;
        $this->body     = $body;

    }

    /**
     * @return mixed
     */
    function getEndpoint()
    {
        return $this->endPoint;
    }

    /**
     * @return mixed
     */
    function getBody()
    {
        return $this->body;
    }
}
