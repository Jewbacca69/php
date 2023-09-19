<?php

class Human {
    private string $name;
    private string $surname;
    private int $age;
    public function  __construct($name, $surname, $age)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->age = $age;
    }

    public function getFirstName() : string {
        return $this->name;
    }

    public function getLastName() : string {
        return $this->surname;
    }

    public function getAge() : int {
        return $this->age;
    }
}

$humans = [
    new Human('John', 'Doe', 20),
    new Human('Jane', 'Doe', 17),
    new Human('John', 'Smith', 19),
    new Human('Jane', 'Smith', 19),
];

function isLegalAge($human) : bool {
    return $human->getAge() >= 18;
}

foreach($humans as $person) {
    $firstname = $person->getFirstName();
    $lastname = $person->getLastName();

    if (isLegalAge($person)) {
        echo "$firstname $lastname is 18 years old or older\n";
    } else {
        echo "$firstname $lastname is younger than 18 years old\n";
    }
}