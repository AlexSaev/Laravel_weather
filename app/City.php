<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    protected $primaryKey = 'city';
    public $incrementing = FALSE;
    public $timestamps = FALSE;

    protected $fillable =['city', 'lat', 'lon'];
}
