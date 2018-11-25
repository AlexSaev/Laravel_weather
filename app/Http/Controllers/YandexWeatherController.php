<?php

namespace App\Http\Controllers;

use App\Adapter\YandexWeatherAdapter;
use App\City;
use App\Weather;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

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

    public function setYandexWeather()
    {
        $input = Input::only('placeName');

        $cityInfo = City::all()->where('city', '=', $input['placeName'])->first();
        // $cityInfo['city'], $cityInfo['lat'], $cityInfo['lon']
        $weatherDTO = $this->yandexWeatherAdapter->getYandexWeather($cityInfo->city, $cityInfo->lat, $cityInfo->lon);

//        DB::insert("insert into weathers (api, city,
//         weather_type, temperature, wind_speed) values (?, ?, ?, ?, ?)", [$weatherDTO->getApi(), $weatherDTO->getCity(), $weatherDTO->getWeatherType(),
//            $weatherDTO->getTemperature(), $weatherDTO->getWindSpeed()]);

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
    
//    public function getData()
//    {
//        $weather = DB::table('weathers')->get();
//        return $weather;
////        Weather::all();
//
//    }
}
