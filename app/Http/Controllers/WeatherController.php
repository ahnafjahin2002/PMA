<?php
namespace App\Http\Controllers;

use App\Services\WeatherService;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    protected $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    public function showWeather(Request $request)
    {
        
        $city = $request->input('city', 'Dhaka'); 
        
        
        $weatherData = $this->weatherService->getWeather($city);
        $forecastData = $this->weatherService->getForecast($city);

        return view('weather', compact('weatherData', 'forecastData'));
    }
}
