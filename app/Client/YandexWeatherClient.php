<?php

namespace App\Client;

use GuzzleHttp\Client;

class YandexWeatherClient
{
//    /**
//     * @param float lon
//     * @param float lat
//     * @return $data
//     */
    public function getYandexWeather($lat, $lon)
    {
//        lon] => 33.52 [lat] => 44.61
        $client = new Client();

        $options =
            [
                'headers' =>
                    [
                        'Accept' => 'application/json',
                        'Contect-type' => 'application/json',
                        'X-Yandex-API-Key' => '2d181745-6cdc-4071-9fea-0889904bf8f3'
                    ]
            ];

        $res = $client->request('GET',"https://api.weather.yandex.ru/v1/informers?lat={$lat}&lon={$lon}", $options);
        $data = json_decode((string)$res->getBody(),true);

        return $data;
    }
}