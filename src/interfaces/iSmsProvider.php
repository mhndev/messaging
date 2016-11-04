<?php
namespace mhndev\messaging\interfaces;

/**
 * Interface iMessage
 * @package mhndev\messaging
 */
interface iSmsProvider
{

    /**
     * @param $to
     * @param $body
     * @return mixed
     */
    function send($to, $body);

}
