<?php

class Dog
{
    public string $name;
    public string $sex;
    private ?Dog $mother = null;
    private ?Dog $father = null;

    public function __construct(string $name, string $sex)
    {
        $this->name = $name;
        $this->sex = $sex;
    }

    public function setFather(Dog $father): void
    {
        $this->father = $father;
    }

    public function setMother(Dog $mother): void
    {
        $this->mother = $mother;
    }

    public function fathersName(): string
    {
        if (isset($this->father)) {
            return $this->father->name;
        }
        return "Unknown";
    }

    public function mothersName(): string
    {
        if (isset($this->mother)) {
            return $this->mother->name;
        }
        return "Unknown";
    }

    public function hasSameMotherAs(Dog $otherDog): bool
    {
        if (isset($this->mother) && isset($otherDog->mother)) {
            return $this->mother->name === $otherDog->mother->name;
        }
        return false;
    }
}

$max = new Dog("Max", "male");
$max->setMother(new Dog("Lady", "female"));
$max->setFather(new Dog("Rocky", "male"));

$coco = new Dog("Coco", "female");
$coco->setMother(new Dog("Molly", "female"));
$coco->setFather(new Dog("Buster", "male"));

$rocky = new Dog("Rocky", "male");
$rocky->setMother(new Dog("Molly", "female"));
$rocky->setFather(new Dog("Sam", "male"));

$dogs = [$max, $coco, $rocky];

foreach ($dogs as $dog) {
    echo "=========================" . PHP_EOL;
    echo "$dog->name's father is " . $dog->fathersName() . PHP_EOL;
    echo "$dog->name's mother is " . $dog->mothersName() . PHP_EOL;
}

echo "=========================" . PHP_EOL;

if ($coco->hasSameMotherAs($rocky)) {
    echo "Coco and Rocky have the same mother." . PHP_EOL;
} else {
    echo "Coco and Rocky do not have the same mother." . PHP_EOL;
}