<?php

include_once("conexion.php");

$sql = "SELECT * FROM series";
$stmt = $db->prepare($sql);
$stmt->execute();
$series = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Series</title>
</head>

<body>
    <ul>
        <?php
        foreach ($series as $serie) {
        ?>
            <li><a href="serie.php?id=<?= $serie["id"] ?>"><?= $serie["title"] . "<br>"; ?></a></li>
        <?php
        }
        ?>
    </ul>
</body>

</html>