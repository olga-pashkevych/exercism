<?php

/** Calculate the Hamming difference between two DNA strands. */

function distance(string $a, string $b): int
{
    $firstDNA = str_split($a);
    $secondDNA = str_split($b);
    $lengthA = strlen($a);
    $lengthB = strlen($b);

    if ($lengthA !== $lengthB) {
        throw new InvalidArgumentException('DNA strands must be of equal length.');
    } else {
        $hamming = $lengthA - count(array_intersect_assoc($firstDNA, $secondDNA));
    }

    return $hamming;
}

//$distance = distance('GATACA', 'GCATAA');
//echo $distance;