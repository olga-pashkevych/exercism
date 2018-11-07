<?php

/**
 * Implement run-length encoding and decoding.
 */

function encode($input)
{
    return preg_replace_callback(
        '/(.)\1*/',
        function ($matches) {
            $length = strlen($matches[0]);
            return ($length > 1 ? $length : '') . $matches[1];
        },
        $input
    );
}

function decode($input)
{
    return preg_replace_callback(
        '/([0-9]*)(.)\2*/',
        function ($matches) {
            print_r($matches);
            return empty($matches[1]) ? $matches[2] : str_repeat($matches[2], $matches[1]);
        },
        $input
    );
}
print_r(decode('2A3SD4F'));