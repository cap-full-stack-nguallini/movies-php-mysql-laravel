@extends('layout')

@section('titulo')
Edit Movie
@endsection

@section('principal')

<form action="/movie/{{$movie->id}}/edit" method="post">
    @csrf
    <p>
        <label for="title">Title: </label>
        <input type="text" name="title" value="{{$movie->title}}">
    </p>
    <p>
        <label for="rating">Rating: </label>
        <input type="text" name="rating" value="{{$movie->rating}}">
    </p>
    <p>
        <label for="awards">Awards: </label>
        <input type="text" name="awards" value="{{$movie->awards}}">
    </p>
    <p>
        <label for="length">Length: </label>
        <input type="text" name="length" value="{{$movie->length}}">
    </p>
    <p>
        <label for="genre_id">Genre</label>
        <select name="genre_id">
            @foreach($genres as $genre)
            <option value="{{$genre->id}}" @if($genre->id == $movie->genre_id)
                SELECTED
                @endif>{{$genre->name}}</option>
            @endforeach
        </select>
    </p>
    <p>
        <input type="submit" value="update">
    </p>
</form>

<ul style="color:red" class="errores">
    @foreach ($errors->all() as $error)
    <li>
        {{$error}}
    </li>
    @endforeach
</ul>

<p><a href="/movies">Go to Movies List</a></p>

<p><a href="/">Go to Home</a></p>

@endsection
