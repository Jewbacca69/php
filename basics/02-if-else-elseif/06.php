<?php

$plateNumber = readline("Enter your plate : ");

switch ($plateNumber) {
    case "PHP1234";
        echo "It's your car";
        break;
    default:
        echo "It's not your car";
        break;
}