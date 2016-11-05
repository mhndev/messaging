<?php

namespace mhndev\messaging;
use mhndev\messaging\interfaces\iMessage;

/**
 * Class Message
 * @package mhndev\messaging
 */
class Message implements iMessage
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

    /**
     * @param $body
     * @return $this
     */
    function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * @param $endPoint
     * @return $this
     */
    function setEndPoint($endPoint)
    {
        $this->endPoint = $endPoint;

        return $this;
    }


}
