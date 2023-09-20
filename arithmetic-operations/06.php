<?php
for ($i = 1; $i <= 110; $i++) {
    $output = '';

    switch (true) {
        case ($i % 3 === 0 && $i % 5 === 0):
            $output = 'CozaLoza';
            break;
        case ($i % 3 === 0):
            $output = 'Coza';
            break;
        case ($i % 5 === 0):
            $output = 'Loza';
            break;
        case ($i % 7 === 0):
            $output = 'Woza';
            break;
        default:
            $output = $i;
            break;
    }

    echo $output . ' ';

    if ($i % 11 === 0) {
        echo PHP_EOL;
    }
}
