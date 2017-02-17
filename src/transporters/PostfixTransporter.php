<?php
namespace mhndev\messaging\transporters;

use mhndev\messaging\interfaces\iMessage;
use mhndev\messaging\interfaces\iTransporter;

/**
 * Class PostfixTransporter
 * @package mhndev\messaging
 */
class PostfixTransporter implements iTransporter
{

    /**
     * @param iMessage $message
     * @return mixed
     */
    function transport(iMessage $message)
    {
        // TODO: Implement transport() method.
    }
}
