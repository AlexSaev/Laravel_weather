<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Weather;

class CoreController extends Controller
{
//    public function show()
//    {
//
//        if(view()->exists('default.index'))
//        {
//            return view('default.index');
//        }
//        else
//        {
//            abort(404);
//        }
//    }

    public static function showWeather()
    {
        $weathers = Weather::all();
        return view('default.index', ['weathers' => $weathers]);
    }

    public function showCityWeather()
    {
        $input = Input::only('city');
        $city = strval($input['city']);
//        $cityWeathers = DB::select("select * from weathers where city = ?", [$city]);
        $cityWeathers = Weather::all()->where('city', '=', $city);
//        $weathers = DB::table('weathers')->paginate(10);
//        $weathers = Weather::all();
//        dump($weathers);
        return view('default.index', ['weathers' => $cityWeathers]);
//        foreach ($weathers as $weather)
//            print_r($weather);
    }
}
