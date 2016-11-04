<?php
namespace mhndev\messaging;

use mhndev\messaging\interfaces\iTransporter;

/**
 * Class PhpSendMailTransporter
 * @package mhndev\messaging
 */
class PhpSendMailTransporter implements iTransporter
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
