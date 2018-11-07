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
    foreach ($words as $word) {
        $result .= preg_replace_callback(
            '/([qu]{2}|[^aeiou]{1,}|[a-z]*)(.*)/',
        //'/([^qu]{1}|[qu]{2}|[^aeiou]{1,}|[a-z]*)(.*)/',
            function ($matches) {
                if (empty($matches[0])) return '';
                return (empty($matches[2])) ? ($matches[1] . 'ay') : ($matches[2] . $matches[1] . 'ay');
            },
            $word
        );
    }

    return $result;
}

print_r(translate('queen'));