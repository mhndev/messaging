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

if(!function_exists('render_html'))
{
    function render_html($path)
    {
        ob_start();
        include($path);
        $var=ob_get_contents();
        ob_end_clean();
        return $var;
    }
}
