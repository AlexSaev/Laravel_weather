<?php


namespace App\DTO;


class WeatherDTO
{
    private $api;
    private $city;
    private $weatherType;
    private $temperature;
    private $windSpeed;

    public function __construct($api, $city, $temperature, $weatherType, $windSpeed)
    {
        $this->api = $api;
        $this->city = $city;
        $this->temperature = $temperature;
        $this->weatherType = $weatherType;
        $this->windSpeed = $windSpeed;
    }

    function getApi()
    {
        return $this->api;
    }

    function getCity()
    {
        return $this->city;
    }

    function getTemperature()
    {
        return $this->temperature;
    }

    function getWeatherType()
    {
        return $this->weatherType;
    }

    function getWindSpeed()
    {
        return $this->windSpeed;
    }
}