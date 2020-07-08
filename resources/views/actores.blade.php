<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/app.css" type="text/css">
    <title>Actores</title>
</head>

<body>

    <form action="/actores/buscar" method="GET">
        <p>
            <label for="nombre">First Name: </label>
            <input id="nombre" type="tipo" name="nombre" value="">
            <input type="submit" value="Buscar">
        </p>
    </form>

    @forelse ($actores as $actor)

    <ul>
        <li><a href="/actor/{{$actor->id}}">{{$actor->getNombreCompleto()}}</a></li>
    </ul>

    @empty

    <p>No hay Actores.</p>

    @endforelse

    {{$actores->links()}}

    <form action="/actores" method="GET">
        <input type="submit" value="Limpiar Filtros de Búsqueda">
    </form>

</body>

</html>
