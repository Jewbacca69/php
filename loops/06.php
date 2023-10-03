<?php

class AsciiFigure {
    const SIZE = 7;

    public static function draw() : void {
        for ($i = 0; $i < self::SIZE; $i++) {
            for ($j = self::SIZE - 1; $j > $i; $j--) {
                echo "/";
            }

            for ($j = 0; $j < $i * 2; $j++) {
                echo "*";
            }

            for ($j = self::SIZE - 1; $j > $i; $j--) {
                echo "\\";
            }
            echo PHP_EOL;
        }
    }
}

AsciiFigure::draw();

/*
class AsciiFigure {
    const SIZE = 7;

    public static function draw() : void {
        for ($i = 0; $i < self::SIZE; $i++) {
            $slashes = str_repeat("/", self::SIZE - $i);
            $asterisks = str_repeat("*", $i * 2);
            $backslashes = str_repeat("\\", self::SIZE - $i);

            echo $slashes . $asterisks . $backslashes . PHP_EOL;
        }
    }
}

AsciiFigure::draw();
*/