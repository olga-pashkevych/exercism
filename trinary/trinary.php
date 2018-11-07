<?php
/**
 * Convert a trinary number, represented as a string (e.g. '102012'), to its decimal equivalent using first principles.
 * The program should consider strings specifying an invalid trinary as the value 0.
 * Trinary numbers contain three symbols: 0, 1, and 2.
 * The last place in a trinary number is the 1's place. The second to last is the 3's place, the third to last is the 9's place, etc.
 */

function toDecimal($trinary)
{
    if (!preg_match('/^[0-2]*$/', $trinary)) {
        return 0;
    }

    $numbers = str_split(strrev($trinary));
    $value = 0;
    foreach ($numbers as $pow => $number)
    {
        $value += $number * (3 ** $pow);
    }
    return $value;
}
