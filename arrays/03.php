<?php

$numbers = [
    1789, 2035, 1899, 1456, 2013,
    1458, 2458, 1254, 1472, 2365,
    1456, 2265, 1457, 2456
];

echo "Enter the value to search for: ";

$input = (int) readline();

$found = in_array($input, $numbers);

switch ($found) {
    case true:
        echo "$input is in the array\n";
        break;
    default:
        echo "$input is not in the array\n";
        break;
}
