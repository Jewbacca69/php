<?php

namespace CompanyRegister;

class DataHandler
{
    private const API_URL = "https://data.gov.lv/dati/lv/api/3/action/datastore_search?resource_id=25e80bf3-f107-4ab4-89ef-251b5b9374e9";

    public function getData(string $identifier): array
    {
        $requestURL = self::API_URL . "&q=" . urlencode($identifier);
        $response = $this->makeRequest($requestURL);

        return json_decode($response, true);
    }

    private function makeRequest(string $url): string
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        curl_close($ch);

        return $response;
    }
}