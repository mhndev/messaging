<?php

namespace mhndev\messaging\interfaces;

/**
 * Interface iTransporter
 * @package mhndev\messaging\interfaces
 */
interface iTransporter
{

    /**
     * @param iMessage $message
     * @return mixed
     */
    function transport(iMessage $message);
}
