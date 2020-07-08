@extends('layout')

@section('estilos')
styles.css
@endsection

@section('titulo')
Detalle Película
@endsection

@section('principal')

@if ($id >= 0 && $id < count($peliculas))

    <p>{{"Título: " . $peliculas[$id]["titulo"]}}</p>
    <p>{{"Rating: " . $peliculas[$id]["rating"]}}</p>

    @else

    <p>{{"El id no es válido o no corresponde a ninguna película."}}</p>

    @endif

@endsection
