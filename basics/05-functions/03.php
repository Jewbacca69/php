<?php

$person = new stdClass();
$person->name = 'John';
$person->surname = 'Doe';
$person->age = 18;

function isLegalAge($person) : bool {
    return $person->age >= 18;
}

if (isLegalAge($person)) {
    echo 'The person is 18 years old or older';
} else {
    echo 'The person is younger than 18 years old';
}