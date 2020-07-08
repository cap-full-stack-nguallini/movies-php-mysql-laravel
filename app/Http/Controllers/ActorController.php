<?php

namespace App\Http\Controllers;

use App\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function directory()
    {
        $actores = Actor::paginate(10);

        $vac = compact('actores');

        return view('actores', $vac);
    }

    public function show($id)
    {
        $actor = Actor::find($id);
        $vac = compact('actor');
        return view('actor', $vac);
    }

    public function search()
    {
        $nombre = $_GET['nombre'];

        $actores = Actor::where('first_name', 'LIKE', '%' . $nombre . '%')
            ->orderBy('last_name')
            ->paginate(999999999999999999999999);

        $vac = compact('actores');

        return view('actores', $vac);
    }
}
