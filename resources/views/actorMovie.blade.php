@extends('layout')

@section('titulo')
Actor - Movie
@endsection

@section('principal')

<form action="/actor-movie/add" method="post">

    @csrf

    <p>
    <label for="actor">Actor</label>
    <select name="actor">
        @foreach ($actores as $actor)
        <option value="{{$actor->id}}">{{$actor->getNombreCompleto()}}</option>
        @endforeach
    </select>
    </p>

    <p>
    <label for="movie">Movie</label>
    <select name="movie">
        @foreach ($movies as $movie)
        <option value="{{$movie->id}}">{{$movie->title}}</option>
        @endforeach
    </select>
    </p>

    <input type="submit" value="add">

</form>

<br>

<p><a href="/">Go to Home</a></p>

@endsection
