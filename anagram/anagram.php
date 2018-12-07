<?php

/** Given a word and a list of possible anagrams, select the correct sublist.  */

function detectAnagrams(string $word, array $list) : array {
    $result = [];

    foreach ($list as $sublist) {
        if (isAnagram($word, $sublist)) {
            $result[] = $sublist;
        }
    }

    return $result;
}

function isAnagram(string $w1, string $w2) : bool {
    $w1 = str_split(mb_strtolower($w1));
    $w2 = str_split(mb_strtolower($w2));

    if ($w1 === $w2) {
        return false;
    }

    sort($w1);
    sort($w2);

    return $w1 === $w2;
}