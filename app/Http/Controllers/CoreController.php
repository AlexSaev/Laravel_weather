<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoreController extends Controller
{
    public function show()
    {

        if(view()->exists('default.index'))
        {
            return view('default.index');
        }
        else
        {
            abort(404);
        }
    }

    public function showWeather()
    {
        $weathers = DB::table('weathers')->paginate(10);
        return view('default.index', ['weathers' => $weathers]);
    }
}
