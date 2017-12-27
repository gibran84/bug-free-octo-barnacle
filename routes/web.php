<?php
use Illuminate\Support\Facades\Auth;

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider within a group which
 * | contains the "web" middleware group. Now create something great!
 * |
 */

Route::get('/', function () {
    return view('welcome', [
        'name' => 'Gibran'
    ]);
});

// an anonymous function
Route::get('/hello', function () {
    return 'Hello World!';
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users', 'UserController@index')->name('users');

Route::get('/users/create', 'UserController@create')->name('create-user');

Route::get('/users/{user}/edit', 'UserController@edit')->name('edit-user');

Route::get('/users/{user}', 'UserController@show')->name('show-user');

Route::post('/users', 'UserController@store');

Route::put('/users/{user}', 'UserController@update')->name('update-user');

foreach (\File::allFiles(__DIR__, '/routes') as $partial) {
    require_once $partial->getPathname();
}

// Route::group([
//     'prefix' => 'api/v1'
// ], function () {

//     Route::get('/', function () {
//         return Auth::user();
//     });
    
//     Route::get('/hola', function () {
//         return 'mundo';
//     });
// });

Route::group([
    'prefix' => 'api/v1',
    'middleware' => 'auth:api'
], function () {
    
    Route::get('/', function () {
        return Auth::user();
    });
});


