<?php

Route::get('/corporate', function () {
    
    return view('corporate.index');
    
})->name('corporate');

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