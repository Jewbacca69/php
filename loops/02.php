<?php

echo "Input number of terms: ";

$input = readline();

$result = 1;

for($i = 1; $i <= $input; $i++){
    $result *= $input;
}

echo "The result is: $result\n";
