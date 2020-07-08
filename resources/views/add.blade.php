@extends('layout')

@section('titulo')
Add Actor
@endsection

@section('principal')

<form action="/actors/add" method="post">
    @csrf
    <p>
        <label for="first_name">First Name: </label>
        <input type="text" name="first_name" value="{{old('first_name')}}">
    </p>
    <p>
        <label for="last_name">Last Name: </label>
        <input type="text" name="last_name" value="{{old('last_name')}}">
    </p>
    <p>
        <label for="rating">Rating: </label>
        <input type="text" name="rating" value="{{old('rating')}}">
    </p>
    <p>
        <label for="favorite_movie_id">Favorite Movie</label>
        <select name="favorite_movie_id">
            <option value="">None</option>
            @foreach($movies as $movie)
            <option value="{{$movie->id}}">{{$movie->title}}</option>
            @endforeach
        </select>
    </p>
    <p>
        <input type="submit" value="Add">
    </p>
</form>

<ul style="color:red" class="errores">
    @foreach ($errors->all() as $error)
    <li>
        {{$error}}
    </li>
    @endforeach
</ul>

<p><a href="/actors">Go to Actors List</a></p>

<p><a href="/">Go to Home</a></p>

@endsection
