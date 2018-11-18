<?php

namespace App\Adapter;

use App\Client\OpenWeatherClient;
use App\Translator\OpenWeatherTranslator;

class OpenWeatherAdapter
{
    private $openWeatherClient;

    public function __construct(OpenWeatherClient $openWeatherClient)
    {
        $this->openWeatherClient = $openWeatherClient;
    }

    public function getOpenWeather($lat, $lon)
    {
        return OpenWeatherTranslator::parseData($this->openWeatherClient->getOpenWeather($lat, $lon));
    }

    // Короче, Меченный... Есть такая мысль, что в транслятор данные вносятся тут,
    // посредством вызова его метода. По сути же своей он является парсером данных из запроса
    // к API. Надеюсь я прав, ибо иначе я не знаю в чем его суть.
}