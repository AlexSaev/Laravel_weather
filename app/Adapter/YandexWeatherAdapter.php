<?php

namespace App\Adapter;

use App\Client\YandexWeatherClient;
use App\Translator\YandexTranslator;

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
       return  YandexTranslator::parseData($this->yandexWeatherClient->getYandexWeather($lat, $lon));
    }
}