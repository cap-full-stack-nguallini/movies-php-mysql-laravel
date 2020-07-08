<?php
include_once("conexion.php");

$sql = "SELECT * FROM genres";
$stmt = $db->prepare($sql);
$stmt->execute();
$genres = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Agregar Pelicula</title>
</head>

<body>

    <form action="guardar.php" method="POST">

        <p>
            Title: <input type="text" name="title">
        </p>
        <p>
            Rating: <input type="text" name="rating">
        </p>
        <p>
            Awards: <input type="text" name="awards">
        </p>
        <p>
            Release Date: <input type="date" name="release_date">
        </p>
        <p>
            Length: <input type="text" name="length">
        </p>
        <p>
            Genre:
            <select name="genre_id">
                <?php
                foreach ($genres as $genre) {
                ?>
                    <option value="<?= $genre['id'] ?>"><?= $genre['name'] ?></option>
                <?php
                }
                ?>
            </select>
        </p>
        <p>
            <input type="submit" value="Agregar Pelicula">
        </p>
    </form>
</body>

</html>