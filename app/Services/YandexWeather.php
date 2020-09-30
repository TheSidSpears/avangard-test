<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Psr\Http\Client\ClientInterface;

class YandexWeather implements CurrentTemperature
{
    /** @var string */
    public $route = 'yandex.weather';

    /** @var ClientInterface */
    private $client;

    public function __construct(ClientInterface $httpClient)
    {
        $this->client = $httpClient;
    }

    public function getCurrentTemperature(float $lat, float $lon): int
    {
        $temperature = Cache::remember("yandex_weather_{$lat}_{$lon}", 1, function () use ($lat, $lon) {
            $responseBody = $this->getResponse($lat, $lon);
            return $responseBody->fact->temp;
        });

        return $temperature;
    }

    protected function getResponse($lat, $lon): \stdClass
    {
        $response = $this->client->get(route($this->route), [
            'query'   => [
                'lat'   => $lat,
                'lon'   => $lon,
                'lang'  => 'ru_RU',
                'limit' => 1,
                'hours' => false,
            ],
            'headers' => [
                'X-Yandex-API-Key' => config('weather_api.yandex.api_key'),
            ]
        ]);
        return \json_decode($response->getBody()->getContents());
    }
}