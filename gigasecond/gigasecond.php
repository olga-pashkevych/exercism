<?php

/** Calculate the moment when someone has lived for 10^9 seconds.
*   A gigasecond is 10^9 (1,000,000,000) seconds.
 */

function from(DateTime $date): DateTime
{
    $gigasecondDate = clone $date;

    return $gigasecondDate->add(new DateInterval('PT1000000000S'));
}