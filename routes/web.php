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

Route::get('/', function () {
    return view('welcome');
});
////
////Route::get('/hello', function () {
////    $tasks = [
////        '1.Проснуться',
////        '2.Подтянуться',
////        '3.Умыться',
////        '4.Побриться'
////    ];
////    return view('hello', compact('tasks'))->with('name', 'Alex');
////});
//Route::get('/tasks', 'TasksController@index');
//
//Route::get('/tasks/{task}', 'TasksController@show');

Route::get('/form', function()
{
    return view('form');
});
/*
Route::get('/page', function ()
{
   echo '<pre>';
   //print_r($_ENV);
   echo config('app.locale');
   echo '<pre>';
   return;
});*/

//Route::post('/comments', "FormController@create");



Route::any('/comments', function()
{
    print_r($_POST);
}
);