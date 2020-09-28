<?php

namespace App\Providers;

use App\Services\CurrentTemperature;
use App\Services\YandexWeather;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class WeatherServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CurrentTemperature::class, function ($app) {
            return new YandexWeather(new Client());
        });
    }
}
