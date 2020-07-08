@extends('layout')

@section('titulo')
Movie
@endsection

@section('principal')

<p>id: {{$genre->id}} - Name: {{$genre->name}} - Rating: {{$genre->rating}} - Active: {{$genre->active}}</p>

<p>
    <span>Movies:</span>
    <ul>
        @foreach ($genre->movies as $movie)
        <li>
            <a href="/movie/{{$movie->id}}">{{$movie->title}}</a>
        </li>
        @endforeach
    </ul>
</p>

<br>

<br>

<a href="/genre/{{$genre->id}}/edit" class="btn btn-success">Edit</a>

<br>

<br>

<form action="/genero/{{$genre->id}}/delete" method="post">
    @csrf
    <p>
        <button class="btn btn-success" type="submit">Delete</button>
    </p>
</form>

<p><a href="/genres">Go to Genres List</a></p>

<p><a href="/">Go to Home</a></p>

@endsection
