<?php
namespace mhndev\messaging\transporters;

use mhndev\messaging\interfaces\iMessage;
use mhndev\messaging\interfaces\iTransporter;

/**
 * Class SendMailCommandTransporter
 * @package mhndev\messaging
 */
class SendMailCommandTransporter implements iTransporter
{

    /**
     * @param iMessage $message
     * @return mixed
     * @throws \Exception
     */
    function transport(iMessage $message)
    {

    }
}
