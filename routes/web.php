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

Route::get('/places/{place}/edit', 'PlacesController@edit')->name('edit-place');

Route::get('/places/{place}', 'PlacesController@show')->name('show-place');


Route::post('/places', 'PlacesController@store');

Route::put('/places/{place}', 'PlacesController@update')->name('place-update');




Route::get('/groups', 'GroupsController@index')->name('groups');

Route::get('/groups/create', 'GroupsController@create')->name('create-group');

Route::get('/groups/{group}/edit', 'GroupsController@edit')->name('edit-group');

Route::get('/groups/{group}', 'GroupsController@show')->name('show-group');

Route::post('/groups', 'GroupsController@store');

Route::put('/groups/{group}', 'GroupsController@update')->name('update-group');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




Route::get('/users', 'UserController@index')->name('users');

Route::get('/users/create', 'UserController@create')->name('create-user');

Route::get('/users/{user}/edit', 'UserController@edit')->name('edit-user');

Route::get('/users/{user}', 'UserController@show')->name('show-user');

Route::post('/users', 'UserController@store');

Route::put('/users/{user}', 'UserController@update')->name('update-user');










