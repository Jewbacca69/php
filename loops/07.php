<?php

class RollTwoDice {
    public static function roll() : void {
        echo "Desired sum: ";
        $userInput = intval(readline());

        if ($userInput < 2 || $userInput > 12) {
            echo "Please enter a valid sum between 2 and 12.\n";
            return;
        }

        while (true) {
            $roll1 = rand(1, 6);
            $roll2 = rand(1, 6);
            $sum = $roll1 + $roll2;

            echo "$roll1 and $roll2 = $sum\n";

            if ($sum === $userInput) {
                break;
            }
        }
    }
}

RollTwoDice::roll();
