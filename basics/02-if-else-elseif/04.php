<?php

$value = 10;
$x = 5;
$y = 20;

if ($value > $x && $value < $y) {
    echo "Value is greater than $x, less than $y.";
} elseif ($value < $x) {
    echo "Value is less than $x.";
} elseif ($value >= $y) {
    echo "Value is greater than or equal to $y.";
} else {
    echo "Value is not within the specified range.";
}