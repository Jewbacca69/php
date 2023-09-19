<?php

$number = 10;
$factorial = 1;

for ($i = 1; $i <= $number; $i++) {
    $factorial *= $i;
}

echo "Product of integers $number is $factorial\n";
