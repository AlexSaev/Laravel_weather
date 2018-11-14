<?php

namespace App\Http\Controllers;

use App\Adapter\YandexWeatherAdapter;
use Illuminate\Http\Request;

class YandexWeatherController extends Controller
{


    /** @var YandexWeatherAdapter */
    private $yandexWeatherAdapter;

    /**
     * YandexWeatherController constructor.
     * @param YandexWeatherAdapter $yandexWeatherAdapter
     * @param OpenWeatherAdapter $openWeatherAdapter
     */
    public function __construct(YandexWeatherAdapter $yandexWeatherAdapter)
    {
        $this->yandexWeatherAdapter = $yandexWeatherAdapter;
    }

    /**
     * @param float $lon
     * @param float $lat
    */
    public function getYandexWeather($lat, $lon)
    {
        $data = $this->yandexWeatherAdapter->getYandexWeather($lat, $lon);

        print_r($data);
    }
}
