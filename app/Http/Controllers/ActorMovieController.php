<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Actor;
use App\Movie;

class ActorMovieController extends Controller
{

    public function create()
    {
        $actores = Actor::all();
        $movies = Movie::all();
        $vac = compact('actores', 'movies');
        return view('actorMovie', $vac);
    }

    public function store(Request $req)
    {
        $actor = Actor::find($req["actor"]);
        $actor->movies()->attach($req["movie"]);
        return redirect("/actor/$actor->id");
    }

    public function destroy(Request $req)
    {
        $actor = Actor::find($req["actor"]);
        $actor->movies()->detach($req["movie"]);
        return redirect("/actor/$actor->id");
    }
}
