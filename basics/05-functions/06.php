<?php

$array = [10, 20, 30, 3.14, "Hello"];

function doubleInteger($number) : int {
    return $number * 2;
}

for ($i = 0; $i < count($array); $i++) {
    if (is_int($array[$i])) {
        echo $array[$i] = doubleInteger($array[$i]) . PHP_EOL;
    }
}