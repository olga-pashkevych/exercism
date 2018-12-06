<?php

/** Given a year, report if it is a leap year. */

function isLeap(int $year) : bool {
    return !($year % 4) && (!!($year % 100) || !($year % 400));
}