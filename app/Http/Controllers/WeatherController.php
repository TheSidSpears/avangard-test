<?php

namespace App\Http\Controllers;


use App\Services\YandexWeather;
use GuzzleHttp\Client;

class WeatherController extends Controller
{
    public function index()
    {
        $httpClient = new Client();
        $yw = new YandexWeather($httpClient);
        list($lat, $lon) = config('weather_api.coordinates.bryansk');

        return $yw->getCurrentTemperature($lat, $lon);
    }
}
