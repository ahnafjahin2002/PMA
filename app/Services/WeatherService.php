<?php
namespace App\Services;

use GuzzleHttp\Client;

class WeatherService
{
    protected $apiKey = '934bcaafe72148c987a24335252304';  // Your WeatherAPI key
    protected $apiUrl = 'http://api.weatherapi.com/v1/';

    public function getWeather($city)
    {
        $client = new Client();
        
        // Fetch current weather and forecast data
        $response = $client->get($this->apiUrl . 'current.json', [
            'query' => [
                'key' => $this->apiKey,
                'q' => $city,
            ]
        ]);

        $data = json_decode($response->getBody()->getContents(), true);

        return $data;
    }

    public function getForecast($city)
    {
        $client = new Client();

        // Fetch forecast data for the next 3 days
        $response = $client->get($this->apiUrl . 'forecast.json', [
            'query' => [
                'key' => $this->apiKey,
                'q' => $city,
                'days' => 3,  // Forecast for the next 3 days
            ]
        ]);

        $data = json_decode($response->getBody()->getContents(), true);

        return $data;
    }
}
