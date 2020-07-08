<?php

include_once("conexion.php");

$sql = "SELECT * FROM actors";
$stmt = $db->prepare($sql);
$stmt->execute();
$actores = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <ul>
        <?php
        foreach ($actores as $actor) {
        ?>
            <li><?= $actor["first_name"] . " " . $actor["last_name"] . "<br>"; ?></li>
        <?php
        }
        ?>
    </ul>
</body>

</html>