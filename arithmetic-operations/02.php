<?php

$number = 10;

function CheckOddEven(int $number) : string {
    if ($number % 2 === 0) {
        return "Even";
    } else {
        return "Odd";
    }
}

echo CheckOddEven($number) . PHP_EOL;
echo "Bye.";