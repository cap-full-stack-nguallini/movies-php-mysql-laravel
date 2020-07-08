@extends('layout')

@section('titulo')
Edit Genre
@endsection

@section('principal')

<form action="/genre/{{$genre->id}}/edit" method="post">
    @csrf
    <p>
        <label for="name">Name: </label>
        <input type="text" name="name" value="{{$genre->name}}">
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

<p><a href="/genres">Go to Genres List</a></p>

<p><a href="/">Go to Home</a></p>

@endsection
