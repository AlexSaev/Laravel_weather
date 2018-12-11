<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes(['verify' => true]);

Route::get('/', function ()
{
   return view('hello');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/showCityWeather', 'CoreController@showCityWeather')->name('show.weather');


Route::post('/setYandexWeatherInfo', 'YandexWeatherController@setYandexWeather')->name('set.yandex.weather');

Route::post('/setOpenWeatherInfo', 'OpenWeatherController@setOpenWeather')->name('set.open.weather');
Route::post('/setCityInfo', 'CityController@setCityInfo')->name('set.city');

//Route::group(['prefix'=>'admin', 'middleware'=>['web', 'auth']], function ()
//{
//    Route::get('/',['middleware' => 'auth', 'uses' => 'CoreController@showWeather', 'as' => 'weather']);
//});
Route::get('/weather',['middleware' => ['verified'], 'uses' => 'CoreController@showWeather', 'as' => 'weather']);

Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Route::post('/makeWallPost', 'CoreController@makeWallPost')->name('make.post');