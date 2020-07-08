@extends('layout')

@section('titulo')
Actor
@endsection

@section('principal')

<p>id: {{$actor->id}} - First Name: {{$actor->first_name}} - Last Name: {{$actor->last_name}} - Rating:
    {{$actor->rating}}</p>

<p>
    <span>Movies Starring:</span>
    <ul>
        <form action="/actor-movie/delete" method="post">
            @csrf
            <input type="hidden" name="actor" value="{{$actor->id}}">
            @forelse ($actor->movies as $movie)
            <li>
                <a href="/movie/{{$movie->id}}">{{$movie->title}}</a>
                <input type="hidden" name="movie" value="{{$movie->id}}">
                <input type="submit" value="Quit">
            </li>
            @empty
            <p>The actor did not starring in any movie.</p>
            @endforelse
        </form>
    </ul>
    <a href="/actor-movie/add">ADD STARRING</a>
</p>

<p>
    @foreach ($movies as $movie)
    @if($actor->favorite_movie_id == $movie->id)
    <span>Favorite Movie: {{$movie->title}}</span>
    @endif
    @endforeach
</p>

<br>

<p><img src="/images/actors/{{$actor->image}}" style="width:300px" alt="No image available."></p>

<form action="/actor/image" method="post" enctype="multipart/form-data">
    @csrf
    <p>
        <input type="file" name="file" value="">
    </p>
    <p>
        <input type="hidden" name="id" value="{{$actor->id}}">
    </p>
    <p>
        <input type="submit" value="Submit Image">
    </p>
</form>

<br>

<ul style="color:red" class="errores">
    @foreach ($errors->all() as $error)
    <li>
        {{$error}}
    </li>
    @endforeach
</ul>

<br>

<a href="/actor/{{$actor->id}}/edit" class="btn btn-success">Edit</a>

<br>

<br>

<form action="/actor/{{$actor->id}}/delete" method="post">
    @csrf
    <p>
        <button class="btn btn-success" type="submit">Delete</button>
    </p>
</form>

<p><a href="/actors">Go to Actors List</a></p>

<p><a href="/">Go to Home</a></p>

@endsection
