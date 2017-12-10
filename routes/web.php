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

Route::get('/places/{place}', 'PlacesController@show')->name('show-place');

Route::post('/places', 'PlacesController@store');

Route::get('/groups', 'GroupsController@index')->name('groups');

Route::get('/groups/create', 'GroupsController@create')->name('create-group');

Route::get('/groups/{group}', 'GroupsController@show')->name('show-group');

Route::post('/groups', 'GroupsController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
