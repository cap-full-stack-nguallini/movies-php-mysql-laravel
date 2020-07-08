<?php
include_once("conexion.php");

$palabra = $_GET["palabra"];

if (isset($_GET["eleccion"])) {
    $eleccion = $_GET["eleccion"];
    if ($eleccion == "series") {
        $sql = "SELECT * FROM series WHERE title LIKE :palabra";
        mostrarData($db, $sql, $palabra);
    } else if ($eleccion == "movies") {
        $sql = "SELECT * FROM movies WHERE title like :palabra";
        mostrarData($db, $sql, $palabra);
    }
} else {
    echo "Error. No ha seleccionado ninguna opción disponible.";
}

function mostrarData($db, $sql, $palabra)
{
    $stmt = $db->prepare($sql);

    $stmt->bindValue(':palabra', '%' . $palabra . '%');

    $stmt->execute();

    $elementos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($elementos as $elemento) {
        echo $elemento["title"] . "<br>";
    }
}
