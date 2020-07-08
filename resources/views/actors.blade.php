@extends('layout')

@section('titulo')
Actors
@endsection

@section('principal')

<form action="/actors/search" method="GET">
    <p>
        <label for="nombre">First Name: </label>
        <input id="nombre" type="tipo" name="nombre" value="">
        <input type="submit" value="Search">
    </p>
</form>

@forelse ($actores as $actor)

<ul>
    <li><a href="/actor/{{$actor->id}}">{{$actor->getNombreCompleto()}}</a></li>
</ul>

@empty

<p>There isn't actores.</p>

@endforelse

{{$actores->links()}}

<form action="/actors" method="GET">
    <input type="submit" value="Clean Search Filters">
</form>

<p><a href="/">Go to Home</a></p>

@endsection
