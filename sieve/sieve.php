<?php
/**
 * Use the Sieve of Eratosthenes to find all the primes from 2 up to a given number.
 */

function sieve($range)
{
    $numbers = array_fill(2, $range - 1, 1);
    for ($i = 2; $i ** 2 <= $range; $i++) {
        if ($numbers[$i] === 1) {
            for ($j = $i * 2; $j <= $range; $j += $i) {
                $numbers[$j] = 0;
            }
        }
    }
    $result = array_keys(array_filter($numbers, function($value) {
        return ($value);
    }));

    return $result;
}
