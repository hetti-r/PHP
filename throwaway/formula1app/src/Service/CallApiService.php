<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class CallApiService
{

    private $httpClient;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function getRacesIn2024(): array
    { //will return an array from json
        $response = $this->httpClient->request("GET", "https://ergast.com/api/f1/2024.json");
        return $response->toArray(); //convert to arrayso we ca nshow it in twig template
    }
}
