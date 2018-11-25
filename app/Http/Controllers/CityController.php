<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Controllers\CoreController;
use App\City;

class CityController extends Controller
{
    public function setCityInfo()
    {
        $input = Input::only('cityName','lat','lon');
        City::create(
            [
                'city' => $input['cityName'],
                'lat' => $input['lat'],
                'lon' => $input['lon']
            ]);
        // как-то костыльно, думаю стоит сделать простенькую вьюху, подтверждающую верность ввода.
        return CoreController::showWeather();
    }
}
