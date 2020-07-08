<?php

include_once("conexion.php");

$sql = "SELECT * FROM genres";
$stmt = $db->prepare($sql);
$stmt->execute();
$genres = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql2 = "SELECT * FROM movies";
$stmt2 = $db->prepare($sql2);
$stmt2->execute();
$movies = $stmt2->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Genres</title>
</head>

<body>
    <ul>
        <?php
        foreach ($genres as $genre) {
        ?>
            <li><?= $genre["name"] . "<br>"; ?></li>
            <ul>
                <?php
                foreach ($movies as $movie) {
                    if ($genre["id"] == $movie["genre_id"]) {
                ?>
                        <li><a href="pelicula.php?id=<?= $movie["id"] ?>"><?= $movie["title"] . "<br>"; ?></a></li>
                <?php
                    }
                }
                ?>
            </ul>
        <?php
        }
        ?>
    </ul>
</body>

</html>