<?php

class EnergyDrinkSurvey
{
    private int $surveyed;
    private float $purchasedEnergyDrinks;
    private float $preferCitrusDrinks;

    public function __construct(int $surveyed, float $purchasedEnergyDrinks, float $preferCitrusDrinks)
    {
        $this->surveyed = $surveyed;
        $this->purchasedEnergyDrinks = $purchasedEnergyDrinks;
        $this->preferCitrusDrinks = $preferCitrusDrinks;
    }

    public function calculateEnergyDrinkers(): int
    {
        return $this->surveyed * $this->purchasedEnergyDrinks;
    }

    public function calculatePreferCitrus(): int
    {
        return $this->surveyed * $this->purchasedEnergyDrinks * $this->preferCitrusDrinks;
    }
}

$survey = new EnergyDrinkSurvey(12467, 0.14, 0.64);

echo "People surveyed: " . $survey->calculateEnergyDrinkers() . "\n";
echo $survey->calculateEnergyDrinkers() . " bought at least one energy drink.\n";
echo $survey->calculatePreferCitrus() . " prefer citrus energy drinks.\n";
