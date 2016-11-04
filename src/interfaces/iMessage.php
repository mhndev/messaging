<?php
namespace mhndev\messaging\interfaces;

/**
 * Interface iMessage
 * @package mhndev\messaging
 */
interface iMessage
{
    /**
     * @return mixed
     */
    function getEndpoint();

    /**
     * @return mixed
     */
    function getBody();
}
