<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/app.css" type="text/css">
    <title>@yield('titulo')</title>
</head>

<body>

    <header>
        <div class="text-right">
            @if (Route::has('login'))
            <div class="top-right links">
                @auth
                <a href="{{ url('/home') }}">Home</a>
                @else
                <a href="{{ route('login') }}">Login</a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
                @endif
                @endauth


            </div>
            @endif
        </div>

            <h1>@yield('titulo')</h1>

    </header>

    <br>

    <section>@yield('principal')</section>

</body>

</html>
