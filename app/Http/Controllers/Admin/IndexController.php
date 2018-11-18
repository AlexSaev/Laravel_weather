<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
// этот контроллер не для проекта
    //
    public function show()
    {

        if(view()->exists('default.mainPage'))
        {
            $data = ['title'=>'Здарова'];
            return view('default.mainPage', $data);
        }
        else
        {
            abort(404);
        }
    }

    public function getArticle($id)
    {
        echo "Article`s id is - ".$id;

    }

    public function getInfo()
    {
        if(view()->exists('default.weatherInfo'))
        {
            return view('default.weatherInfo');
        }
        else
        {
            abort(404);
        }

    }
}
