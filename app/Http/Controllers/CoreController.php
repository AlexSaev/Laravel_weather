<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Weather;
use GuzzleHttp\Client;

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

//    public function __construct(VkApiClient $vkApiClient)
//    {
//        $this->vkApiClient = $vkApiClient;
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
        $cityWeathers = Weather::all()->where('city', '=', $city);
        return view('default.index', ['weathers' => $cityWeathers]);
    }

    public function makeWallPost()
    {
        // личный токен, который не робит
        $token = "4fb4b7990f6c3c9809fd4f990fdc1c15a006f7a6d9bca4910aa8e43fdd47f331463f16b10888766ec6567";
//        $token = "1717c36a30c44be8eb0fa1e7a85b41d8107811d34a3fa85469601fbc098d7f809b1765a01a84475471be0";
//        $code = "58f4ef4c3aaa81fb69";
        // мой айдишник
        $id = "157824880";
//        $id = "-33910205";
        $message = "Rabotai_pozhaluista";
        $v = 5.92;

        $url = "https://api.vk.com/method/wall.post?owner_id={$id}&message={$message}
        &access_token={$token}&v={$v}";
        $client = new Client();
        $response = $client->post($url);


        return $response;
    }
}

