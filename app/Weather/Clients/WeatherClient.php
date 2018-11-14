<?php

use GuzzleHttp\Client;

class WeatherClient
{
    public function showWeather($url)
    {

//        $url = 'https://api.openweathermap.org/data/2.5/weather?q=Sevastopol,ua&lang=ru&appid=1c43b98c49d9a591bf57077cff7b1385';
        $client = new Client();
        $response = $client->get($url);

        $data = json_decode($response->getBody(), true);

        return $data;
    }
}

