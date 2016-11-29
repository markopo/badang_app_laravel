<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {

    return view('welcome');
});

Route::get('/feedback', function () {
    return "You've been clicked, punk.";
});

Route::get('/login', 'LoginController@index');
Route::post('/doLogin', 'LoginController@doLogin');
Route::get('/Logout', 'LoginController@logout');


Route::get('articles/create', 'ArticlesController@create');
Route::post('articles/create', 'ArticlesController@store');


Route::get('admin/', 'AdminController@index');
Route::post('admin/upload/', 'AdminController@upload');
Route::get('admin/show','AdminController@show');


