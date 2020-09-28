<?php

namespace App\Http\Controllers;


use App\Services\CurrentTemperature;
use Illuminate\Http\Response;

class WeatherController extends Controller
{
    public function currentTemperature(CurrentTemperature $weatherService, string $city): Response
    {
        list($lat, $lon) = config("weather_api.coordinates.$city");

        return response(
            $weatherService->getCurrentTemperature($lat, $lon)
        );
    }
}
