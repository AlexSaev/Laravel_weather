<?php

namespace App\Adapter;

use App\Client\YandexWeatherClient;

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

    public function getYandexWeather($lat, $lon)
    {
       return $this->yandexWeatherClient->getYandexWeather($lat, $lon);
    }
}