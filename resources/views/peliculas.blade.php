@extends('layout')

@section('estilos')
app.css
@endsection

@section('titulo')
Peliculas
@endsection

@section('principal')

@forelse ($peliculas as $pelicula)

<ul>
    <li class="text-muted">{{$pelicula["titulo"]}}
        @if ($pelicula["rating"] > 8)
        {{" - Recomendada."}}
        @endif
    </li>
</ul>

@empty

<p>No hay películas.</p>

@endforelse

@endsection
