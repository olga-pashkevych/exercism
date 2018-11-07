<?php

/** Given a phrase, count the occurrences of each word in that phrase. */
function wordCount(string $string){
    $result = [];

    if (isset($string)) {
        $string = str_replace(array("\n", "\t"), ' ', $string);
        $string = preg_replace('/[^A-Za-z0-9\ ]/', '', $string);
        $string = strtolower($string);
        $string = preg_replace('!\s+!', ' ', $string);
        $string = trim($string);

        $words = explode(' ', $string);
        $result = array_count_values($words);
    }

    return $result;
}

//print_r(wordCount("\t\tIntroductory Cou@@#rse"));
