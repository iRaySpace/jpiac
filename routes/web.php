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

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/events', 'EventsController@index');
Route::get('/profiles', 'ProfilesController@index');

Route::get('/events/create', 'EventsController@create');
Route::get('/profiles/create', 'ProfilesController@create');

Route::get('/events/{event}', 'EventsController@show');
Route::get('/profiles/{profile}', 'ProfilesController@show');

Route::post('/events', 'EventsController@store');
Route::post('/profiles', 'ProfilesController@store');

Route::delete('/events/{event}', 'EventsController@destroy');
Route::delete('/profiles/{profile}', 'ProfilesController@destroy');

Route::post('/profiles/events', 'ProfilesController@join');