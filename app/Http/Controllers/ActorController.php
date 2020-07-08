<?php

namespace App\Http\Controllers;

use App\Actor;

use App\Movie;

use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function index()
    {
        $actores = Actor::paginate(10);
        $vac = compact('actores');
        return view('actors', $vac);
    }

    public function show($id)
    {
        $actor = Actor::find($id);
        $movies = Movie::all();
        $vac = compact('actor', 'movies');
        return view('actor', $vac);
    }

    public function search()
    {
        $nombre = $_GET['nombre'];
        $actores = Actor::where('first_name', 'LIKE', '%' . $nombre . '%')
            ->orderBy('last_name')
            ->paginate(999999999999999999999999);
        $vac = compact('actores');
        return view('actors', $vac);
    }

    public function create()
    {
        $movies = Movie::all();
        $vac = compact('movies');
        return view('add', $vac);
    }

    public function store(Request $req)
    {
        $reglas = [
            "first_name" => "required|string",
            "last_name" => "required|string",
            "rating" => "required|numeric"
        ];

        $mensajes = [
            "required" => "The field :attribute is required.",
            "string" => "The field :attribute must be a string.",
            "numeric" => "The field :attribute must be a number."
        ];

        $this->validate($req, $reglas, $mensajes);

        $actor = new Actor;
        $actor->first_name = $req["first_name"];
        $actor->last_name = $req["last_name"];
        $actor->rating = $req["rating"];
        $actor->favorite_movie_id = $req["favorite_movie_id"];

        $actor->save();

        return redirect('/actors');
    }

    public function edit($id)
    {
        $actor = Actor::find($id);
        $movies = Movie::all();
        $vac = compact('actor', 'movies');
        return view('edit', $vac);
    }

    public function update(Request $req)
    {
        $reglas = [
            "first_name" => "required|string",
            "last_name" => "required|string",
            "rating" => "required|numeric"
        ];

        $mensajes = [
            "required" => "The field :attribute is required.",
            "string" => "The field :attribute must be a string.",
            "numeric" => "The field :attribute must be a number."
        ];

        $this->validate($req, $reglas, $mensajes);

        $id = $req["id"];

        $actor = Actor::find($id);

        $actor->first_name = $req["first_name"];
        $actor->last_name = $req["last_name"];
        $actor->rating = $req["rating"];
        $actor->favorite_movie_id = $req["favorite_movie_id"];

        $actor->save();

        return redirect("/actor/$id");
    }

    public function destroy(Request $req, $id)
    {
        $actor = Actor::find($id);

        $cantidadDeMovies = $actor->movies()->count();

        if ($cantidadDeMovies == 0) {
        $actor->delete();
        return redirect("/actors");
        } else {
            $vac = compact('cantidadDeMovies');
            return view('actorNoWrite', $vac);
        }
    }

    public function upLoadFile(Request $req)
    {
        $reglas = ['file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2040'];
        $mensaje = [
            'image' => 'El archivo debe ser una imágen.',
            'mimes' => 'Formato de Archivo no admitido.'
        ]; // Validación para el caso de imágen

        $this->validate($req, $reglas, $mensaje);

        $id = $req["id"];
        $actor = Actor::find($id);

        if ($req->file('file')) {
            $archivo = $req->file('file');
            $fileOriginalName = $archivo->getClientOriginalName();
            $ext = pathinfo($fileOriginalName, PATHINFO_EXTENSION);
            $nombreArchivo = uniqid("img_") . "." . $ext;
            $archivo->move('images/actors', $nombreArchivo);
            $actor->image =  $nombreArchivo;
        }

        $actor->save();

        return redirect("/actor/$id");
    }
}
