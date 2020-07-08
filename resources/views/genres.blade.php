@extends('layout')

@section('titulo')
Genres
@endsection

@section('principal')

@forelse ($genres as $genre)

<ul>
    <li><a href="/genre/{{$genre->id}}">{{$genre->name}}</a></li>
</ul>

@empty

<p>There isn't genres.</p>

@endforelse

<p><a href="/">Go to Home</a></p>

@endsection
