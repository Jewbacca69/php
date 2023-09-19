<?php

$fruits = [
    ['name' => 'Apple', 'weight' => 12],
    ['name' => 'Banana', 'weight' => 8],
    ['name' => 'Orange', 'weight' => 15],
    ['name' => 'Watermelon ', 'weight' => 5],
];

function isOver10Kg($weight) : bool
{
    return $weight > 10;
}

$shippingCosts = [
    'under_10kg' => 1,
    'over_10kg' => 2,
];

foreach ($fruits as $fruit) {
    $name = $fruit['name'];
    $weight = $fruit['weight'];
    $shippingCost = isOver10Kg($weight) ? $shippingCosts['over_10kg'] : $shippingCosts['under_10kg'];

    echo "Fruit: $name, Weight: $weight kg, Shipping Cost: $shippingCost euros\n";
}
