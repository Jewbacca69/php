<?php

$firstWord = readline("Enter first word: ");
$secondWord = readline("Enter second word: ");

$maxLength = 30;

$dotCount = $maxLength - strlen($firstWord) - strlen($secondWord);

$wordWithDots = $firstWord;

for($i = 0; $i < $dotCount; $i++){
    $wordWithDots .= ".";
}

echo $wordWithDots .= $secondWord;
