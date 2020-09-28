<?php

Route::domain('https://api.weather.yandex.ru/v2')->group(function () {
    Route::get('forecast')->name("yandex.weather");
});