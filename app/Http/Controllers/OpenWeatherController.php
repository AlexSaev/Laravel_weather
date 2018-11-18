<?php

namespace App\Http\Controllers;

use App\Adapter\OpenWeatherAdapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OpenWeatherController extends Controller
{
    /** @var openWeatherAdapter */
    private $openWeatherAdapter;

    /**
     * OpenWeatherController constructor.
     * @param OpenWeatherAdapter $openWeatherAdapter
     */
    public function __construct(OpenWeatherAdapter $openWeatherAdapter)
    {
        $this->openWeatherAdapter = $openWeatherAdapter;
    }

    /**
     * @param float $lon
     * @param float $lat
     * @param string $cityName
     */
    public function setOpenWeather($lat, $lon, $cityName)
    {
        $data = $this->openWeatherAdapter->getOpenWeather($lat, $lon);

        DB::insert('insert into weathers (api, lat, lon, city,
             weather_type, temperature, wind_speed) values (?, ?, ?, ?, ?, ?, ?)', ['OpenWeather', $lat, $lon,
            $cityName,$data['weather_type'], $data['temperature'], $data['wind_speed'] ]);
    }
}