<?php
// app/Services/CurrencyConverterService.php

namespace App\Services;

use GuzzleHttp\Client;

class CurrencyConverterService
{
    protected $apiUrl = 'https://v6.exchangerate-api.com/v6/6ac6675048ccae4019aad7cf/latest/'; // Replace with your API key

    public function convertCurrency($fromCurrency, $toCurrency, $amount)
    {
        $client = new Client();
        $response = $client->get($this->apiUrl . $fromCurrency); // Fetch exchange rates for the source currency
        $data = json_decode($response->getBody()->getContents(), true); // Decode the response to an array
        
        if ($data['result'] == 'success') {
            // Get the exchange rate for the target currency
            $rate = $data['conversion_rates'][$toCurrency];
            
            // Calculate the converted amount
            $convertedAmount = $amount * $rate;
            return $convertedAmount;
        }
        
        return null;  // Return null if the API response is not successful
    }
}
