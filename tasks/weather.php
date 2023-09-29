<?php

$apiKey = '';

function getData(string $location, string $apiKey): ?array
{
    $geoUrl = "https://api.openweathermap.org/geo/1.0/direct?q=$location&appid=$apiKey";
    $geoData = json_decode(file_get_contents($geoUrl), true);

    if (empty($geoData)) {
        return null;
    }

    $latitude = $geoData[0]['lat'];
    $longitude = $geoData[0]['lon'];

    $weatherUrl = "https://api.openweathermap.org/data/2.5/weather?lat=$latitude&lon=$longitude&units=metric&appid=$apiKey";
    return json_decode(file_get_contents($weatherUrl), true);
}

function displayData(array $data): void
{
    echo
        "===============================================================\n".
        "Current Weather for : {$data['name']}\n" .
        "===============================================================\n".
        "Weather : {$data['weather'][0]['description']}\n" .
        "Temperature : {$data['main']['temp']}°C\n" .
        "Pressure : {$data['main']['pressure']} hPa\n" .
        "Wind Speed : {$data['wind']['speed']} m/s\n" .
        "Humidity : {$data['main']['humidity']}%\n" .
        "===============================================================\n"
    ;
}

echo 'Weather app.' . PHP_EOL;

while (true) {
    $location = readline('Enter location: ');

    $weatherData = getData($location, $apiKey);

    echo $weatherData === null ? 'Location not found.' : displayData($weatherData);
}





