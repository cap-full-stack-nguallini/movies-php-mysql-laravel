@extends('layout')

@section('titulo')
Add Genre
@endsection

@section('principal')

<form action="/genero/add" method="post">
    @csrf
    <p>
        <label for="name">Name: </label>
        <input type="text" name="name" value="{{old('name')}}">
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

<p><a href="/genres">Go to Genres List</a></p>

<p><a href="/">Go to Home</a></p>

@endsection
