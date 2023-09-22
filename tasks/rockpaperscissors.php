<?php

$elements = [
    'rock' => ['scissors', 'insect'],
    'paper' => ['water', 'tree'],
    'scissors' => ['paper', 'lizard'],
    'lizard' => ['insect', 'tree'],
    'insect' => ['rock', 'tree'],
    'tree' => ['water', 'rock'],
];

function getWinner(string $userChoice, string $PcChoice, array $elements): string
{
    if ($userChoice === $PcChoice) {
        return "It's a tie!";
    }

    if (in_array($PcChoice, $elements[$userChoice])) {
        return 'You win!';
    } else {
        return 'Computer wins!';
    }
}

while (true) {
    echo "Available elements: " . implode(', ', array_keys($elements)) . "\n";
    $userChoice = strtolower(readline("Enter your choice or 'q' to exit : "));

    if ($userChoice === 'q') {
        exit();
    }

    if (array_key_exists($userChoice, $elements) === false) {
        echo "Invalid choice. Please choose one of the available elements.\n";
        continue;
    }

    $PcChoice = array_rand($elements);
    echo "Computer chose: $PcChoice\n";

    $result = getWinner($userChoice, $PcChoice, $elements);
    echo "$result\n";
}
