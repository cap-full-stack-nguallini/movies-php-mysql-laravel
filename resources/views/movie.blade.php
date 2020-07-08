@extends('layout')

@section('titulo')
Movie
@endsection

@section('principal')

<p>id: {{$movie->id}} - Title: {{$movie->title}} - Rating: {{$movie->rating}} - Awards: {{$movie->awards}} - Release
    Date: {{$movie->release_date}} - Length: {{$movie->length}} </p>

<p>Genre: {{$movie->genre->name}}</p>

<p>
    <span>Actors Starring:</span>
    <ul>
        @foreach ($movie->actors as $actor)
        <li>
            <a href="/actor/{{$actor->id}}">{{$actor->getNombreCompleto()}}</a>
        </li>
        @endforeach
    </ul>
</p>

<br>

<a href="/movie/{{$movie->id}}/edit" class="btn btn-success">Edit</a>

<br>

<br>

<form action="/movie/{{$movie->id}}/delete" method="post">
    @csrf
    <p>
        <button class="btn btn-success" type="submit">Delete</button>
    </p>
</form>

<p><a href="/movies">Go to Movies List</a></p>

<p><a href="/">Go to Home</a></p>

@endsection
