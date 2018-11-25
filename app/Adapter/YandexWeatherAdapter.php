<?php

namespace App\Adapter;

use App\Client\YandexWeatherClient;
use App\Translator\YandexTranslator;
use App\DTO\WeatherDTO;

class YandexWeatherAdapter
{
    /**
     * @var $yandexWeatherClient
    */
    private $yandexWeatherClient;

    public function __construct(YandexWeatherClient $yandexWeatherClient)
    {
        $this->yandexWeatherClient = $yandexWeatherClient;
    }

    public function getYandexWeather($city, $lat, $lon)
    {
        $data = YandexTranslator::parseData($this->yandexWeatherClient->getYandexWeather($lat, $lon));

        return $weatherDTO = new WeatherDTO('Yandex', $city, $data['temperature'], $data['weather_type'], $data['wind_speed']);
    }
}