<?php

namespace App\Http\Controllers;

use App\Adapter\OpenWeatherAdapter;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

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


    public function getOpenWeather($lat, $lon)
    {
        $data = $this->openWeatherAdapter->getOpenWeather($lat, $lon);

        print_r($data);

    }
}

