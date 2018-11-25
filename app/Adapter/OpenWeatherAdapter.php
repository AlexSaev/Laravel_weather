<?php

namespace App\Adapter;

use App\Client\OpenWeatherClient;
use App\Translator\OpenWeatherTranslator;
use App\DTO\WeatherDTO;

class OpenWeatherAdapter
{
    private $openWeatherClient;

    public function __construct(OpenWeatherClient $openWeatherClient)
    {
        $this->openWeatherClient = $openWeatherClient;
    }

    public function getOpenWeather($city, $lat, $lon)
    {
        $data = OpenWeatherTranslator::parseData($this->openWeatherClient->getOpenWeather($lat, $lon));

        return $weatherDTO = new WeatherDTO('OpenWeather', $city, $data['temperature'], $data['weather_type'], $data['wind_speed']);
    }
}