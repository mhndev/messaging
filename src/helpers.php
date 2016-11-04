<?php

/**
 * isAssoc array which determines if an array is associative
 */
if(!function_exists('isAssoc'))
{
    function isAssoc(array $arr)
    {
        if (array() === $arr) return false;
        return array_keys($arr) !== range(0, count($arr) - 1);
    }
}
