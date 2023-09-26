<?php
$array1 = [];

$min = 0;
$max = 10;

for ($i = $min; $i < $max; $i++) {
    $array1[] = rand(1, 100);
}

$array2 = $array1;

$array1[9] = -7;

echo "Array 1: " . implode(' ', $array1) . PHP_EOL;
echo "Array 2: " . implode(' ', $array2) . PHP_EOL;
