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

Route::get('/miPrimeraRuta', function () {
    return "Creé mi primer ruta en Laravel.";
});

Route::get('/esPar/{numero}', function ($numero) {
    $mensaje = "El número es impar.";

    if ($numero % 2 === 0) {
        $mensaje = "El número es par.";
    }

    return $mensaje;
});

Route::get('/sumar/{numero1}/{numero2}', function ($numero1, $numero2) {

    return ($numero1 + $numero2);
});

Route::get('/sumarOpc/{numero1}/{numero2}/{numero3?}', function ($numero1, $numero2, $numero3 = 0) {

    return ($numero1 + $numero2 + $numero3);
});

Route::get('/peliculas', function () {
    $peliculas = [
        0 => ["titulo" => "El clan", "rating" => 8],
        1 => ["titulo" => "El Angel", "rating" => 9],
        2 => ["titulo" => "Relatos salvajes", "rating" => 7],
        3 => ["titulo" => "Nueve reinas", "rating" => 10],
        4 => ["titulo" => "El potro", "rating" => 6]
    ];
    $vac = compact('peliculas');
    return view('peliculas', $vac);
});

Route::get('/peliculas/{id}', function ($id) {

    $peliculas = [
        0 => ["titulo" => "El clan", "rating" => 8],
        1 => ["titulo" => "El Angel", "rating" => 9],
        2 => ["titulo" => "Relatos salvajes", "rating" => 7],
        3 => ["titulo" => "Nueve reinas", "rating" => 10],
        4 => ["titulo" => "El potro", "rating" => 6]
    ];

    $vac = compact('peliculas', 'id');

    return view('detallePelicula', $vac);
});
