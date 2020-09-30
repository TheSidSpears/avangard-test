<?php

namespace App\Http\Controllers;


use App\Services\CurrentTemperature;
use Illuminate\View\View;

class WeatherController extends Controller
{
    /**
     * @param  CurrentTemperature  $weatherService
     * @param  string  $city
     * @return View
     */
    public function currentTemperature(CurrentTemperature $weatherService, string $city): View
    {
        list($lat, $lon) = config("weather_api.coordinates.$city");

        return view('weather', [
            'currentTemperature' => $weatherService->getCurrentTemperature($lat, $lon),
            'city' => $city,
        ]);
    }
}
