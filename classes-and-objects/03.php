<?php

class FuelGauge
{
    private int $fuelLevel;

    public function __construct()
    {
        $this->fuelLevel = 0;
    }

    public function getFuelLevel(): int
    {
        return $this->fuelLevel;
    }

    public function incrementFuel(): void
    {
        if ($this->fuelLevel < 70) {
            $this->fuelLevel++;
        }
    }

    public function decrementFuel(): void
    {
        if ($this->fuelLevel > 0) {
            $this->fuelLevel--;
        }
    }
}

class Odometer
{
    private int $mileage;

    public function __construct()
    {
        $this->mileage = 0;
    }

    public function getMileage(): int
    {
        return $this->mileage;
    }

    public function increaseMileage(): void
    {
        if ($this->mileage < 999999) {
            $this->mileage++;
        } else {
            $this->mileage = 0;
        }
    }

    public function drive(FuelGauge $fuelGauge): void
    {
        if ($fuelGauge->getFuelLevel() > 0) {
            $this->increaseMileage();
            if ($this->mileage % 10 === 0) {
                $fuelGauge->decrementFuel();
            }
        }
    }
}

$fuelGauge = new FuelGauge();
$odometer = new Odometer();

for ($i = 0; $i < 70; $i++) {
    $fuelGauge->incrementFuel();
}

while ($fuelGauge->getFuelLevel() > 0) {
    $odometer->drive($fuelGauge);
    echo "Mileage: " . $odometer->getMileage() . " km\n";
    echo "Fuel Level: " . $fuelGauge->getFuelLevel() . " liters\n\n";
}
