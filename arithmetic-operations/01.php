<?php

function checkDifference(int $int1, int $int2) : int {
    $sum = $int1 + $int2;
    $difference = $int1 - $int2;

    return ($num1 === 15 || $num2 === 15 || $sum === 15 || $difference === 15);
}

$num1 = 10;
$num2 = 5;

if(checkDifference($num1, $num2)) {
    echo "True";
} else {
    echo "False";
}
