<?php
$gravity = -9.81;
$time = 10;

$position = 0.5 * $gravity * $time * $time;

echo "The position of the object after $time seconds is approximately: " . number_format($position, 2) . " meters\n";
