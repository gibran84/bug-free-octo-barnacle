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
    return view('welcome', [
        'name' => 'Gibran'
    ]);
});

Route::get('/places', 'PlacesController@index');

Route::get('/places/create', 'PlacesController@create');

Route::post('/places', 'PlacesController@store');

//Route::get('/places/{place}', 'PlacesController@show');
