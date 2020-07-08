@extends('layout')

@section('titulo')
Add Movie
@endsection

@section('principal')

<form action="/movies/add" method="post">
    @csrf
    <p>
        <label for="title">Title: </label>
        <input type="text" name="title" value="{{old('title')}}">
    </p>
    <p>
        <label for="rating">Rating: </label>
        <input type="text" name="rating" value="{{old('rating')}}">
    </p>
    <p>
        <label for="awards">Awards: </label>
        <input type="text" name="awards" value="{{old('awards')}}">
    </p>
    <p>
        <label for="release_date">Release Date: </label>
        <input type="date" name="release_date" value="{{old('release_date')}}">
    </p>
    <p>
        <label for="length">Length: </label>
        <input type="text" name="length" value="{{old('length')}}">
    </p>
    <p>
        <label for="genre_id">Genre</label>
        <select name="genre_id">
            @foreach($genres as $genre)
            <option value="{{$genre->id}}">{{$genre->name}}</option>
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

<p><a href="/movies">Go to Movies List</a></p>

<p><a href="/">Go to Home</a></p>

@endsection
