<?php

namespace App\Services;

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
        $responseBody = $this->getResponse($lat, $lon);

        return $responseBody->fact->temp;
    }

    protected function getResponse(...$options): \stdClass
    {
        $response = $this->client->get(route($this->route), [
            'query'   => [
                'lat'   => $options[0],
                'lon'   => $options[1],
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