<?php

namespace App\Providers;

use App\Services\CurrentTemperature;
use App\Services\YandexWeather;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class WeatherServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(CurrentTemperature::class, function ($app) {
            return new YandexWeather(new Client());
        });
    }
}
