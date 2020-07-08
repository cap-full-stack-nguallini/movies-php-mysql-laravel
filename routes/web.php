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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/actors', 'ActorController@index');

Route::get('/actor/{id}', 'ActorController@show')->middleware('usrlog');

Route::get('/actors/search', 'ActorController@search');

Route::get('/actors/add', 'ActorController@create')->middleware('usrlog');

Route::post('/actors/add', 'ActorController@store')->middleware('usrlog');

Route::get('/actor/{id}/edit', 'ActorController@edit')->middleware('usrlog');

Route::post('/actor/{id}/edit', 'ActorController@update')->middleware('usrlog');

Route::post('/actor/{id}/delete', 'ActorController@destroy')->middleware('usrlog');

Route::post('/actor/image', 'ActorController@upLoadFile')->middleware('usrlog');

Route::get('/movies', 'MovieController@index');

Route::get('/movie/{id}', 'MovieController@show')->middleware('usrlog');

Route::get('/movies/add', 'MovieController@create')->middleware('usrlog');

Route::post('/movies/add', 'MovieController@store')->middleware('usrlog');

Route::get('/movie/{id}/edit', 'MovieController@edit')->middleware('usrlog');

Route::post('/movie/{id}/edit', 'MovieController@update')->middleware('usrlog');

Route::post('/movie/{id}/delete', 'MovieController@destroy')->middleware('usrlog');

Route::get('/genres', 'GenreController@index');

Route::get('/genre/{id}', 'GenreController@show')->middleware('usrlog');

Route::get('/genero/add', 'GenreController@create')->middleware('usrlog');

Route::post('/genero/add', 'GenreController@store')->middleware('usrlog');

Route::get('/genre/{id}/edit', 'GenreController@edit')->middleware('usrlog');

Route::post('/genre/{id}/edit', 'GenreController@update')->middleware('usrlog');

Route::post('/genero/{id}/delete', 'GenreController@destroy')->middleware('usrlog');

Route::get('/actor-movie/add', 'ActorMovieController@create')->middleware('usrlog');

Route::post('/actor-movie/add', 'ActorMovieController@store')->middleware('usrlog');

Route::post('/actor-movie/delete', 'ActorMovieController@destroy')->middleware('usrlog');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/redirectlog', function () {
    return view('redirectlog');
});

Route::get('/user/{id}/edit', 'UserController@edit')->middleware('usrlog');

Route::post('/user/update', 'UserController@update')->middleware('usrlog');

Route::post('/user/updatepass', 'UserController@updatePass')->middleware('usrlog');

Route::post('/user/avatar', 'UserController@avatar')->middleware('usrlog');
