<?php
$maxRows = 3;
$maxColumns = 4;

$money = 50;

$elements = ['💩', '🤢', '💀', '🤑'];
$winElements = ['🤑'];

$winCombinations = [
    [0, 1, 2, 3],
    [4, 5, 6, 7],
    [8, 9, 10, 11],
    [0, 1, 2, 7],
    [4, 5, 6, 11],
    [4, 1, 2, 3],
    [8, 5, 6, 7]
];

while ($money > 0) {
    echo 'Money: ' . $money . PHP_EOL;
    $choice = readline('Do you want to play? Press "y" to play.');

    if (strtolower($choice) !== 'y') break;

    $money--;

    $board = generateBoard($elements, $maxRows, $maxColumns);
    displayBoard($board, $maxRows);

    $isWinning = isWinningCombination($board, $winCombinations, $winElements);

    if ($isWinning) {
        echo "Congratulations! You won!\n";
        $money += 10;
    } else {
        echo "You lost!\n";
    }
}

echo "You're out of money... Don't forget to bring more luck next time! \n";

function generateBoard(array $elements, int $maxRows, int $maxColumns): array
{
    $board = [];
    for ($row = 0; $row < $maxRows; $row++) {
        $board[$row] = [];

        for ($column = 0; $column < $maxColumns; $column++) {
            $board[$row][] = $elements[array_rand($elements)];
        }
    }

    return $board;
}

function displayBoard(array $board, int $maxRows): void
{
    echo '-----------------' . PHP_EOL;
    for ($row = 0; $row < $maxRows; $row++) {
        echo implode(' | ', $board[$row]) . PHP_EOL;
    }
    echo '-----------------' . PHP_EOL;
}

function isWinningCombination(array $board, array $winningCombinations, array $winningElements): bool
{
    foreach ($winningCombinations as $combination) {
        $winning = true;

        foreach ($combination as $index) {
            $row = floor($index / count($board[0]));
            $column = $index % count($board[0]);

            if ($board[$row][$column] !== $winningElements[0]) {
                $winning = false;
                break;
            }
        }

        if ($winning) {
            return true;
        }
    }

    return false;
}
