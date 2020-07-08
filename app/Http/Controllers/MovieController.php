<?php

namespace App\Http\Controllers;

use App\Movie;
use App\Genre;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        $vac = compact('movies');
        return view('movies', $vac);
    }

    public function show($id)
    {
        $movie = Movie::find($id);
        $vac = compact('movie');
        return view('movie', $vac);
    }

    public function create()
    {
        $genres = Genre::all();
        $vac = compact('genres');
        return view('addMovie', $vac);
    }

    public function store(Request $req)
    {
        $reglas = [
            "title" => "required|string",
            "rating" => "required|numeric",
            "awards" => "required|numeric",
            "release_date" => "required|date",
            "length" => "required|numeric"
        ];

        $mensajes = [
            "required" => "The field :attribute is required.",
            "string" => "The field :attribute must be a string.",
            "numeric" => "The field :attribute must be a number.",
            "date" => "The field :attribute must be a date."
        ];

        $this->validate($req, $reglas, $mensajes);

        $movie = new Movie;
        $movie->title = $req["title"];
        $movie->rating = $req["rating"];
        $movie->awards = $req["awards"];
        $movie->release_date = $req["release_date"];
        $movie->length = $req["length"];
        $movie->genre_id = $req["genre_id"];

        $movie->save();

        return redirect('/movies');
    }

    public function edit($id)
    {
        $movie = Movie::find($id);
        $genres = Genre::all();

        $vac = compact('movie', 'genres');

        return view('editMovie', $vac);
    }

    public function update(Request $req)
    {
        $reglas = [
            "title" => "required|string",
            "rating" => "required|numeric",
            "awards" => "required|numeric",
            "length" => "required|numeric"
        ];

        $mensajes = [
            "required" => "The field :attribute is required.",
            "string" => "The field :attribute must be a string.",
            "numeric" => "The field :attribute must be a number.",
        ];

        $this->validate($req, $reglas, $mensajes);

        $id = $req["id"];

        $movie = Movie::find($id);

        $movie->title = $req["title"];
        $movie->rating = $req["rating"];
        $movie->awards = $req["awards"];
        $movie->length = $req["length"];
        $movie->genre_id = $req["genre_id"];

        $movie->save();

        return redirect("/movie/$id");
    }

    public function destroy(Request $req, $id)
    {
        $movie = Movie::find($id);

        $cantidadDeActores = $movie->actors()->count();

        if ($cantidadDeActores == 0) {
            $movie->delete();
            return redirect("/movies");
        } else {
            $vac = compact('cantidadDeActores');
            return view('movieNoWrite', $vac);
        }
    }

    public function api()
    {
        $movie = Movie::all();
        return json_encode($movie);
    }
}
