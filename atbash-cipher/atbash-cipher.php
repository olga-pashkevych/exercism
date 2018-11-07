<?php

/** Create an implementation of the atbash cipher,
 *  an ancient encryption system created in the Middle East.
 *
 * Encoding 'test' gives 'gvhg'
*  Decoding 'gvhg' gives 'test'
 */
function encode(string $text): string
{
    $text = preg_replace('/[^a-z0-9]/', '', strtolower($text));
    $plain = 'abcdefghijklmnopqrstuvwxyz';
    $cipher ='zyxwvutsrqponmlkjihgfedcba';

    return trim(chunk_split(strtr($text, $cipher, $plain), 5, ' '));
}

//echo encode ('The quick brown fox jumps over the lazy dog.');