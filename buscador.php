<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Buscador</title>
</head>

<body>

    <form action="buscar.php" method="GET">
        <p>
            ¿Que desea buscar?
            <br>
            Series:
            <input type="radio" name="eleccion" value="series">
            &nbsp; &nbsp; &nbsp;
            Movies:
            <input type="radio" name="eleccion" value="movies">
        </p>
        <p>
            Buscar: <input type="text" name="palabra">
            <input type="submit" value="Buscar">
        </p>
    </form>

</body>

</html>