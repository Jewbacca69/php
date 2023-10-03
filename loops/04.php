<?php

class FizzBuzz {

    public static function run(int $maxValue) : void {
        $output = '';

        for ($i = 1; $i <= $maxValue; $i++) {
            if ($i % 3 === 0 && $i % 5 === 0) {
                $output .= 'FizzBuzz ';
            } elseif ($i % 3 === 0) {
                $output .= 'Fizz ';
            } elseif ($i % 5 === 0) {
                $output .= 'Buzz ';
            } else {
                $output .= $i . ' ';
            }

            if ($i % 20 === 0) {
                $output .= "\n";
            }
        }

        echo $output;
    }
}

$input = readline("Max value : ");
FizzBuzz::run($input);