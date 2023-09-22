<?php

function calculate(float $param1 = 0, float $param2 = null, string $shape = ''): float {
    if ($param1 < 0 || $param2 < 0) {
        return -1;
    }

    switch ($shape) {
        case 'circle':
            return M_PI * $param1 * $param1;
        case 'rectangle':
            return $param1 * $param2;
        case 'triangle':
            return 0.5 * $param1 * $param2;
        default:
            return -1;
    }
}

echo "Geometry Calculator\n";
echo "1. Calculate the Area of a Circle\n";
echo "2. Calculate the Area of a Rectangle\n";
echo "3. Calculate the Area of a Triangle\n";
echo "4. Quit\n";

while (true) {
    $choice = (int) readline("Enter your choice (1-4): ");

    if (in_array($choice, ['1', '2', '3', '4']) === false) {
        echo "Invalid choice. Please enter a number between 1 and 4.\n";
        continue;
    }

    if ($choice == 4) {
        exit();
    }

    switch ($choice) {
        case 1:
            $shape = 'circle';
            $param1 = (float)readline("Enter the radius of the circle: ");
            break;
        case 2:
            $shape = 'rectangle';
            $param1 = (float)readline("Enter the length of the rectangle: ");
            $param2 = (float)readline("Enter the width of the rectangle: ");
            break;
        case 3:
            $shape = 'triangle';
            $param1 = (float)readline("Enter the base of the triangle: ");
            $param2 = (float)readline("Enter the height of the triangle: ");
            break;
    }

    $area = calculate($param1, $param2, $shape);

    if ($area == -1) {
        echo "Dimensions cannot be negative or invalid shape.\n";
    } else {
        echo "The area of the $shape is: " . number_format($area, 2) . "\n";
    }
}
