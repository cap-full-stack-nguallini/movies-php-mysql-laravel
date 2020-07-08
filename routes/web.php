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

Route::get('/actor/{id}', 'ActorController@show');

Route::get('/actors/search', 'ActorController@search');

Route::get('/actors/add', 'ActorController@create');

Route::post('/actors/add', 'ActorController@store');

Route::get('/actor/{id}/edit', 'ActorController@edit');

Route::post('/actor/{id}/edit', 'ActorController@update');

Route::post('/actor/{id}/delete', 'ActorController@destroy');

Route::post('/actor/image', 'ActorController@upLoadFile');

Route::get('/movies', 'MovieController@index');

Route::get('/movie/{id}', 'MovieController@show');

Route::get('/movies/add', 'MovieController@create');

Route::post('/movies/add', 'MovieController@store');

Route::get('/movie/{id}/edit', 'MovieController@edit');

Route::post('/movie/{id}/edit', 'MovieController@update');

Route::post('/movie/{id}/delete', 'MovieController@destroy');

Route::get('/genres', 'GenreController@index');

Route::get('/genre/{id}', 'GenreController@show');

Route::get('/genero/add', 'GenreController@create');

Route::post('/genero/add', 'GenreController@store');

Route::get('/genre/{id}/edit', 'GenreController@edit');

Route::post('/genre/{id}/edit', 'GenreController@update');

Route::post('/genero/{id}/delete', 'GenreController@destroy');

Route::get('/actor-movie/add', 'ActorMovieController@create');

Route::post('/actor-movie/add', 'ActorMovieController@store');

Route::post('/actor-movie/delete', 'ActorMovieController@destroy');
