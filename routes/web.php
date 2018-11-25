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


Route::get('/coordinates', function ()
{
    return view('form');
});


//Route::get('/form', function()
//{
//    return view('form');
//});
//
//
//Route::get('/page/{id}/{name}', function ($id,$name)
//{
//
//    echo 'id = '.$id.' | '.'name = '.$name;
//    return;
//})/*->where(['id'=>'[0-9]+', 'name'=>'[A-Za-z]+'])*/; //пример фильтрации параметров
//
//
//// ниже приведен пример группировки роутов
//
//Route::group(['prefix'=>'admin/{id}'], function ()
//{
//   Route::get('page/create', function()
//   {
//      return redirect()->route('article', array('id' => 25)); // пример редирректа на другой роут
//   });
//   Route::get('page/edit', function()
//   {
//      echo 'page/edit';
//   });
//});
//
//Route::get('/article/{id}', ['as'=>'article', function ($id) // собственно роут на который уходит редиреккт
//{
//    echo $id;
//}]);

//Route::get('/article/{page}',['uses'=>'YandexWeatherController@getArticle', 'as'=>'article'])
//    ->middleware('mymiddle');


//Route::get('/', ['as'=>'home', 'uses'=>'CoreController@show']);





//Route::group(['prefix'=>'/weather'], function ()
//{
//    Route::get('yandex/{cityName}/{lat}/{lon}','YandexWeatherController@setYandexWeather');
//
//    Route::get('openweather/{cityName}/{lat}/{lon}','OpenWeatherController@setOpenWeather'); OpenWeatherController@setOpenWeather
//});   !!!!!!!!!!!

Route::post('/showCityWeather', 'CoreController@showCityWeather')->name('show.weather');

Route::get('/', 'CoreController@showWeather')->name('home');
Route::post('/setYandexWeatherInfo', 'YandexWeatherController@setYandexWeather')->name('set.yandex.weather');

Route::post('/setOpenWeatherInfo', 'OpenWeatherController@setOpenWeather')->name('set.open.weather');
Route::post('/setCityInfo', 'CityController@setCityInfo')->name('set.city');