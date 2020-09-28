<?php

namespace App\Http\Controllers;


use App\Services\YandexWeather;

class WeatherController extends Controller
{
    public function index()
    {
        $yw = new YandexWeather();
        list($lat, $lon) = config('weather_api.coordinates.bryansk');

        return $yw->getCurrentTemperature($lat, $lon);
    }
}
