<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Genre;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        $vac = compact('genres');
        return view('genres', $vac);
    }

    public function show($id)
    {
        $genre = Genre::find($id);
        $vac = compact('genre');
        return view('genre', $vac);
    }

    public function create()
    {
        return view('addGenero');
    }

    public function store(Request $req)
    {
        $reglas = [
            "name" => "required|string"
        ];

        $mensajes = [
            "required" => "The field :attribute is required.",
            "string" => "The field :attribute must be a string."
        ];

        $this->validate($req, $reglas, $mensajes);

        $genre = new Genre;
        $genre->name = $req["name"];

        $genre->save();

        return redirect('/genres');
    }

    public function edit($id)
    {
        $genre = Genre::find($id);

        $vac = compact('genre');

        return view('editGenero', $vac);
    }

    public function update(Request $req)
    {
        $reglas = [
            "name" => "required|string"
        ];

        $mensajes = [
            "required" => "The field :attribute is required.",
            "string" => "The field :attribute must be a string."
        ];

        $this->validate($req, $reglas, $mensajes);

        $id = $req["id"];

        $genre = Genre::find($id);

        $genre->name = $req["name"];

        $genre->save();

        return redirect("/genre/$id");
    }

    public function destroy(Request $req, $id)
    {
        $genre = Genre::find($id);

        $cantidadDeMovies = $genre->movies()->count();

        if ($cantidadDeMovies == 0) {
            $genre->delete();
            return redirect("/genres");
        } else {
            $vac = compact('cantidadDeMovies');
            return view('genreNoWrite', $vac);
        }
    }
}
