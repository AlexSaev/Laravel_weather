<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    //
    protected $table ='weathers';

    public $timestamps = FALSE;

    protected $fillable =['api', 'city', 'weather_type', 'temperature', 'wind_speed', 'date'];
}
