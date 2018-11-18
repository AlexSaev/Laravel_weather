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

        $response = $client->request('GET',"https://api.weather.yandex.ru/v1/informers?lat={$lat}&lon={$lon}", $options);
//        $data = json_decode((string)$response->getBody(),true);

//        return $data;

        return $response;
    }
}