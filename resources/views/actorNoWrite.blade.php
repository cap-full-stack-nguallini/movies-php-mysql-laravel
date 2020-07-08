@extends('layout')

@section('titulo')
Notice
@endsection

@section('principal')

<p>No es posible Borrar/Editar el actor porque tiene {{$cantidadDeMovies}} movie/s en las que ha participado.</p>

<br>

<p><a href="/actors">Go to Actors List</a></p>

<p><a href="/">Go to Home</a></p>

@endsection
