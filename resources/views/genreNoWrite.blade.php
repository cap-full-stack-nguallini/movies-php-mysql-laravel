@extends('layout')

@section('titulo')
Notice
@endsection

@section('principal')

<p>No es posible Borrar/Editar el Género porque tiene {{$cantidadDeMovies}} movie/s asignada/s</p>

<br>

<p><a href="/genres">Go to Genres List</a></p>

<p><a href="/">Go to Home</a></p>

@endsection
