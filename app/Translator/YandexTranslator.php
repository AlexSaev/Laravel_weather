<?php

namespace App\Translator;

class YandexTranslator
{
    public static function parseData($response)
    {
        $data = json_decode($response->getBody(), true);

        $weatherInfo = array('weather_type' => $data['fact']['condition'],
            'temperature' => $data['fact']['temp'],
            'wind_speed' => $data['fact']['wind_speed']);

        return $weatherInfo;
    }
}