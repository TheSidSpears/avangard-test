<?php

namespace App\Http\Controllers;


use App\Services\CurrentTemperature;

class WeatherController extends Controller
{
    public function index(CurrentTemperature $weatherService)
    {
        list($lat, $lon) = config('weather_api.coordinates.bryansk');

        return $weatherService->getCurrentTemperature($lat, $lon);
    }
}
