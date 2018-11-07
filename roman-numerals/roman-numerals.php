<?php
/**
 * Write a function to convert from normal numbers to Roman Numerals.
 */


function toRoman(string $value): string
{
    $romanicNums = [
        'M' => 1000,
        'CM' => 900,
        'D' => 500,
        'CD' => 400,
        'C' => 100,
        'XC' => 90,
        'L' => 50,
        'XL' => 40,
        'X' => 10,
        'IX' => 9,
        'V' => 5,
        'IV' => 4,
        'I' => 1
    ];
    $returnValue = '';
    while ($value > 0) {
        foreach ($romanicNums as $roman => $int) {
            if($value >= $int) {
                $value -= $int;
                $returnValue .= $roman;
                break;
            }
        }
    }

    return $returnValue;
}