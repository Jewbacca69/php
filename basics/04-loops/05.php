<?php

$person1 = new stdClass();
$person1->name = 'John';
$person1->surname = 'Doe';
$person1->age = 50;

$humans[] = $person1;

$person2 = new stdClass();
$person2->name = 'Jane';
$person2->surname = 'Doe';
$person2->age = 30;

$humans[] = $person2;

$person3 = new stdClass();
$person3->name = 'Linda';
$person3->surname = 'Doe';
$person3->age = 25;

$humans[] = $person3;

foreach($humans as $human) {
    echo "Name : $human->name\n";
    echo "Surname : $human->surname\n";
    echo "Age : $human->age\n";
}

