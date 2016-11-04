<?php
namespace mhndev\messaging;

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
