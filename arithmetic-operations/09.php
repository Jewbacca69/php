<?php

function calculateBMI(float $weight, float $height): float
{
    return $weight / ($height ** 2);
}

function classifyWeight(float $bmi): string
{
    if ($bmi < 18.5) {
        return 'underweight';
    } elseif ($bmi <= 25) {
        return 'optimal weight';
    } else {
        return 'overweight';
    }
}

$weight = (float)readline('Input your weight in kilograms: ');
$height = (float)readline('Input your height in centimeters: ');

$heightInMeters = $height / 100;

$yourBMI = calculateBMI($weight, $heightInMeters);
$weightClassification = classifyWeight($yourBMI);

echo 'Your BMI : ' . number_format($yourBMI, 2) . PHP_EOL;
echo 'Your weight classification : ' . $weightClassification . PHP_EOL;