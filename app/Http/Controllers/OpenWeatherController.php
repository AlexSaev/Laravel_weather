<?php

namespace App\Http\Controllers;

use App\Adapter\OpenWeatherAdapter;
use App\City;
use App\Weather;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;


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

    public function setOpenWeather()
    {
        $input = Input::only('placeName');

        $cityInfo = City::all()->where('city', '=', $input['placeName'])->first();
        // $cityInfo['city'], $cityInfo['lat'], $cityInfo['lon']
        $weatherDTO = $this->openWeatherAdapter->getOpenWeather($cityInfo->city, $cityInfo->lat, $cityInfo->lon);


//            DB::insert('insert into weathers (api, lat, lon, city,
//            weather_type, temperature, wind_speed) values (?, ?, ?, ?, ?, ?, ?)', ['OpenWeather', $lat, $lon,
//            $cityName,$data['weather_type'], $data['temperature'], $data['wind_speed'] ]);

        Weather::create(
            [
                'api' => $weatherDTO->getApi(),
                'city' => $weatherDTO->getCity(),
                'weather_type' => $weatherDTO->getWeatherType(),
                'temperature' => $weatherDTO->getTemperature(),
                'wind_speed' => $weatherDTO->getWindSpeed(),
                'date' => date('Y-m-d H:i:s')
            ]);

        return CoreController::showWeather();

    }
}