<?php

$randomNumber = rand(1, 100);

$guesses = 3;

while ($guesses > 0) {
    $guess = readline("Guess the number between 1 and 100 : ");

    if($guess > $randomNumber) {
        echo "Too high\n";
    } elseif ($guess < $randomNumber) {
        echo "Too low\n";
    } else {
        echo "Congratulations! You guessed the number!\n";
    }

    $guesses--;
}