<?php

class Piglet {
    public static function play() : void {
        echo "Welcome to Piglet!\n";
        $score = 0;

        while (true) {
            $roll = rand(1, 6);

            echo "You rolled a $roll!\n";

            if ($roll === 1) {
                echo "You got 0 points.\n";
                break;
            }

            $score += $roll;

            echo "Roll again? y / n ";
            $choice = readline();

            if ($choice !== 'y') {
                break;
            }
        }

        echo "Your final score is: $score\n";
    }
}

Piglet::play();