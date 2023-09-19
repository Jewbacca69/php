<?php

$items = [
    [
        [
            "name" => "John",
            "surname" => "Doe",
            "age" => 50
        ],
        [
            "name" => "Jane",
            "surname" => "Doe",
            "age" => 41
        ]
    ]
];

$person1 = $items[0][0]["name"];
$person2 = $items[0][1]["name"];
$person2surname = $items[0][1]["surname"];

echo $person1 . " & " . $person2 . " " . $person2surname . "`s";
