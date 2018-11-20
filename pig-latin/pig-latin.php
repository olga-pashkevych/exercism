<?php
/**
 * Created by PhpStorm.
 * User: daisy
 * Date: 2018-11-04
 * Time: 21:20
 */

function translate($text) {
    $result = '';
    $words = explode(' ', $text);
    $wordsCount = count($words);
    foreach ($words as $key => $word) {
        $result .= preg_replace_callback(
            '/((?:xr)|(?:yt)|[^aeiou]*qu|[^aeiou]*)(.+)/',
            function ($matches) {
                if (empty($matches[0])) return '';
                if (in_array($matches[1], ['xr', 'yt'])) return $matches[0] . 'ay';
                return (empty($matches[2])) ? ($matches[1] . 'ay') : ($matches[2] . $matches[1] . 'ay');
            },
            $word
        );
        if ($wordsCount > 0) $result .= ' ';
    }

    return trim($result);
}