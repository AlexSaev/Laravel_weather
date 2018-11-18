<?php

namespace App\Translator;

class OpenWeatherTranslator
{
    public static function parseData($response)
    {
        $data = json_decode($response->getBody(), true);

        $weatherInfo = array('weather_type' => ($data['weather'][0]['description']),
            'temperature' => ($data['main']['temp'] - 273),
            'wind_speed' => $data['wind']['speed']);

        return $weatherInfo;
    }
}