@extends('layout')

@section('titulo')
User Profile
@endsection

@section('principal')

<p><img src="/images/users/{{$userlog->avatar}}" alt="No Image" style="width: 150px"></p>

<form action="/user/avatar" method="post" enctype="multipart/form-data">
    @csrf
    <p>
        <input type="file" name="avatar">
    </p>
    <p>
        <input type="hidden" name="id" value="{{$userlog->id}}">
    </p>
    <p>
        <input type="submit" value="Submit Avatar">
    </p>
</form>

<hr>

<ul style="color:red" class="errores">
    @foreach ($errors->all() as $error)
    <li>
        {{$error}}
    </li>
    @endforeach
</ul>

<form action="/user/update" method="post">
    @csrf
    <p>
        <label for="name">Name: </label>
        <input type="text" name="name" value="{{$userlog->name}}">
    </p>
    <p>
        <label for="surname">Surname: </label>
        <input type="text" name="surname" value="{{$userlog->surname}}">
    </p>
    <p>
        <label for="email">E-Mail: </label>
        <input type="email" name="email" value="{{$userlog->email}}">
    </p>
    <p>
        <input type="hidden" name="id" value="{{$userlog->id}}">
    </p>
    <p>
        <input type="submit" value="Update">
    </p>
</form>

<hr>

<form action="/user/updatepass" method="post">
    @csrf
    <p>
        <label for="password">Change Password: </label>
        <input type="password" name="password" value="">
    </p>
    <p>
        <label for="repassword">Confirm Password: </label>
        <input type="password" name="repassword" value="">
    </p>
    <p>
        <input type="hidden" name="id" value="{{$userlog->id}}">
    </p>
    <p>
        <input type="submit" value="Update Password">
    </p>
</form>

<p><a href="/">Go to Home</a></p>

@endsection
