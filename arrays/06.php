<?php

$words = ["dog", "elephant", "chicken", "whale", "penguin"];

$chosenWord = $words[array_rand($words)];

$attempts = 6;
$guessedLetters = [];

echo "Welcome to Hangman!\n";

while ($attempts > 0) {
    $displayWord = "";
    foreach (str_split($chosenWord) as $letter) {
        if (in_array($letter, $guessedLetters)) {
            $displayWord .= $letter;
        } else {
            $displayWord .= "_";
        }
    }

    echo "Word: $displayWord\n";
    echo "Misses: " . implode(", ", array_diff($guessedLetters, str_split($chosenWord))) . "\n";

    if ($displayWord === $chosenWord) {
        echo "Congratulations! You guessed the word: $chosenWord\n";
        break;
    }

    $guess = strtolower(readline("Guess a letter: "));

    if (strlen($guess) !== 1 || !preg_match('/^[a-zA-Z]$/', $guess)) {
        echo "Invalid input. Please enter a single letter.\n";
        continue;
    }

    if (in_array($guess, $guessedLetters)) {
        echo "You already guessed '$guess'. Try again.\n";
        continue;
    }

    $guessedLetters[] = $guess;

    if (strpos($chosenWord, $guess) === false) {
        $attempts--;

        if ($attempts === 0) {
            echo "Out of attempts! The word was: $chosenWord\n";
            break;
        }
    }
}

echo "Thanks for playing!\n";
