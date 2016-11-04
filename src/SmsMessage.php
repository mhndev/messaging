<?php
namespace mhndev\messaging;
use mhndev\messaging\interfaces\iMessage;

/**
 * Class SmsMessage
 * @package mhndev\messaging
 */
class SmsMessage extends aMessage implements iMessage
{
    /**
     * SmsMessage constructor.
     * @param $endPoint
     * @param $body
     */
    public function __construct($endPoint, $body)
    {
        parent::__construct($endPoint, $body);
    }



}
