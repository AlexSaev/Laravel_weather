<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function create (Request $request)
    {
        return $request->toArray();
    }
}
