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


Route::get('/', ['as'=>'home', 'uses'=>'CoreController@show']);

Route::get('/article/{id}',['uses'=>'Admin\IndexController@getArticle', 'as'=>'article']);

Route::get('/info', ['uses'=>'Admin\IndexController@getInfo', 'as'=>'info']);

Route::group(['prefix'=>'/weather'], function ()
{
    Route::get('yandex/{cityName}/{lat}/{lon}','YandexWeatherController@setYandexWeather');

    Route::get('openweather/{cityName}/{lat}/{lon}','OpenWeatherController@setOpenWeather');
});

Route::get('/weathers', 'CoreController@showWeather');