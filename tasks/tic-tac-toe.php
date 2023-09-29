<?php

$board = [
    [' ', ' ', ' '],
    [' ', ' ', ' '],
    [' ', ' ', ' ']];

$player = 'X';

function displayBoard(array $board): void
{
    foreach ($board as $row) {
        echo implode(' | ', $row) . PHP_EOL;
        echo "---------" . PHP_EOL;
    }
}

function makeMove(array &$board, int $row, int $col, string $player): void
{
    if ($board[$row][$col] == ' ') {
        $board[$row][$col] = $player;
    }
}

function switchPlayer(string &$player): void
{
    $player = ($player === 'X') ? 'O' : 'X';
}

function checkWinner(array $board, string $player): bool
{
    for ($i = 0; $i < 3; $i++) {
        if (($board[$i][0] === $player && $board[$i][1] === $player && $board[$i][2] === $player) ||
            ($board[0][$i] === $player && $board[1][$i] === $player && $board[2][$i] === $player)) {
            return true;
        }
    }

    if (($board[0][0] === $player && $board[1][1] === $player && $board[2][2] === $player) ||
        ($board[0][2] === $player && $board[1][1] === $player && $board[2][0] === $player)) {
        return true;
    }

    return false;
}

function isDraw(array $board): bool
{
    foreach ($board as $row) {
        if (in_array(' ', $row, true)) {
            return false;
        }
    }
    return true;
}

function displayWinner(string $player): void
{
    if ($player === 'X') {
        echo "You won!\n";
    } else {
        echo "Computer won!\n";
    }
}

echo "Tic Tac Toe\n";
displayBoard($board);

while (true) {
    $move = readline("Player $player, enter row and column (Example: '1 2'): ");
    $move = trim($move);
    $input = explode(" ", $move);

    if (count($input) !== 2 || !is_numeric($input[0]) || !is_numeric($input[1])) {
        echo "Invalid move.\n";
        continue;
    }

    $row = (int)$input[0];
    $col = (int)$input[1];

    if ($row >= 0 && $row < 3 && $col >= 0 && $col < 3 && $board[$row][$col] == ' ') {
        makeMove($board, $row, $col, $player);
        displayBoard($board);

        if (checkWinner($board, $player)) {
            displayWinner($player);
            break;
        } elseif (isDraw($board)) {
            echo "It's a draw!\n";
            break;
        }

        switchPlayer($player);
    } else {
        echo "Invalid move.\n";
    }
}
