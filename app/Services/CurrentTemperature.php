<?php


namespace App\Services;


interface CurrentTemperature
{
    public function getCurrentTemperature(float $lat, float $lon): int;
}