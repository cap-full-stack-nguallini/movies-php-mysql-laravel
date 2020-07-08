@extends('layout')

@section('titulo')
Movies
@endsection

@section('principal')

@forelse ($movies as $movie)

<ul>
    <li><a href="/movie/{{$movie->id}}">{{$movie->title}}</a>
        @if ($movie->rating > 8)
        {{" - Recomendada."}}
        @endif
    </li>
</ul>

@empty

<p>There isn't movies.</p>

@endforelse

<p><a href="/">Go to Home</a></p>

@endsection
