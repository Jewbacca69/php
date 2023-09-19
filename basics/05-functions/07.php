<?php

class Gun {
    private string $name;
    private int $price;
    private string $license;

    public function __construct($name, $price, $license) {
        $this->name = $name;
        $this->price = $price;
        $this->license = $license;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getPrice(): int {
        return $this->price;
    }

    public function getLicense(): string {
        return $this->license;
    }
}

$weapons = [
    new Gun('Gun1', 1200, 'A'),
    new Gun('Gun2', 1100, 'A'),
    new Gun('Gun1', 1200, 'B'),
    new Gun('Gun2', 1100, 'C'),
];

$person = new stdClass();
$person->name = 'John';
$person->money = 2000;
$person->licenses = ['c', 'd'];

foreach($weapons as $weapon) {
    $canBuy = canBuy($person, $weapon);
    if ($canBuy) {
        echo 'You can buy : ' . $weapon->getName() . PHP_EOL;
    }
}

function canBuy(stdClass $person, Weapon $weapon): bool {
    $personLicenses = $person->licenses;
    $personMoney = $person->money;
    $neededLicense = $weapon->getLicense();

    $isPermitted = in_array($neededLicense, $personLicenses);
    $hasMoney = $personMoney > $weapon->getPrice();

    return $isPermitted && $hasMoney;
}
