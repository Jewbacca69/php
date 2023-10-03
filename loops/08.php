<?php

class NumberSquare {
    public static function display() : void {
        echo "Min? ";
        $min = intval(readline());

        echo "Max? ";
        $max = intval(readline());

        if ($min > $max) {
            echo "Min should be less than or equal to Max.\n";
            return;
        }

        $range = range($min, $max);
        $numRows = $max - $min + 1;

        for ($i = 0; $i < $numRows; $i++) {
            for ($j = $i; $j < $numRows + $i; $j++) {
                echo $range[$j % $numRows];
            }
            echo "\n";
        }
    }
}

NumberSquare::display();