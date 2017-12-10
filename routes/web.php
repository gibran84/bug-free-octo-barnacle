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

Route::get('/places', 'PlacesController@index')->name('places');

Route::get('/places/create', 'PlacesController@create')->name('places-create');

Route::post('/places', 'PlacesController@store');

//Route::get('/showQualityResult', ['as' => 'quality-result.show', 'uses' => 'QualityCheckController@showQualityResult']);

Route::get('/places/{place}', 'PlacesController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
