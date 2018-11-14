<?php

namespace App\Adapter;

use App\Client\OpenWeatherClient;

class OpenWeatherAdapter
{
    /**
     * @var $openWeatherClient
     */
    private $openWeatherClient;

    public function __construct(OpenWeatherClient $openWeatherClient)
    {
        $this->openWeatherClient = $openWeatherClient;
    }

    public function getOpenWeather($lat, $lon)
    {
        return $this->openWeatherClient->getOpenWeather($lat, $lon);
    }
}
