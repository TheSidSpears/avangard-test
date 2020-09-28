<?php

namespace App\Services;

use GuzzleHttp\Client;

class YandexWeather //todo implements WeatherAPI
{
    public $route = 'yandex.weather';

    public function getCurrentTemperature(float $lat, float $lon): int
    {
        // todo агрегорование \Psr\Http\Client\ClientInterface?
        $client = new Client();

        $response = $client->get(route($this->route), [
            'query'   => [
                'lat' => $lat,
                'lon' => $lon,
                'lang'  => 'ru_RU',
                'limit' => 1,
                'hours' => false,
            ],
            'headers' => [
                'X-Yandex-API-Key' => config('weather_api.yandex.api_key'),
            ]
        ]);

        $responseBody = \json_decode($response->getBody()->getContents());
        return $responseBody->fact->temp;
    }
}