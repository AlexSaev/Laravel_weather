<?php

namespace App\Http\Controllers;

use App\Adapter\YandexWeatherAdapter;
use App\Weather;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class YandexWeatherController extends Controller
{
    /** @var YandexWeatherAdapter */
    private $yandexWeatherAdapter;

    /**
     * YandexWeatherController constructor.
     * @param YandexWeatherAdapter $yandexWeatherAdapter
     */
    public function __construct(YandexWeatherAdapter $yandexWeatherAdapter)
    {
        $this->yandexWeatherAdapter = $yandexWeatherAdapter;
    }

    /**
     * @param float $lon
     * @param float $lat
     * @param string $cityName
    */
    public function setYandexWeather($cityName, $lat, $lon)
    {
        $data = $this->yandexWeatherAdapter->getYandexWeather($lat, $lon);

        DB::insert('insert into weathers (api, lat, lon, city,
         weather_type, temperature, wind_speed) values (?, ?, ?, ?, ?, ?, ?)', ['Yandex', $lat, $lon,
            $cityName,$data['weather_type'], $data['temperature'], $data['wind_speed'] ]);
    }
    
    public function getData()
    {
        $weather = DB::table('weathers')->get();
        return $weather;
//        Weather::all();

    }
    
}
