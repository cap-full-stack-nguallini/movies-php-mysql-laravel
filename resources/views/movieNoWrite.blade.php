@extends('layout')

@section('titulo')
Notice
@endsection

@section('principal')

<p>No es posible Borrar/Editar la Película porque tiene {{$cantidadDeActores}} actor/s que ha/n participado en ella.</p>

<br>

<p><a href="/movies">Go to Movies List</a></p>

<p><a href="/">Go to Home</a></p>

@endsection
