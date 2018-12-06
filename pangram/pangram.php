<?php

/** Determine if a sentence is a pangram */

function isPangram (string $string) : bool {
    return preg_match_all('/([a-z])(?!.*\1)/i', $string) == 26 ? true : false;
}
