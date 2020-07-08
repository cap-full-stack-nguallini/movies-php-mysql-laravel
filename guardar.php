<?php
include_once("conexion.php");

$title = $_POST['title'];
$rating = $_POST['rating'];
$awards = $_POST['awards'];
$release_date = $_POST['release_date'];
$length = $_POST['length'];
$genre_id = $_POST['genre_id'];

$sql2 = "SELECT * FROM movies WHERE title = '$title'";
$stmt2 = $db->prepare($sql2);
$stmt2->execute();
$movies = $stmt2->fetchAll(PDO::FETCH_ASSOC);

$coincidencias = count($movies);

if ($coincidencias == 0) {
    $sql = "INSERT INTO movies(title, rating, awards, release_date, length, genre_id)
            VALUES (:title, :rating, :awards, :release_date, :length, :genre_id)";
} else {
    $sql = "UPDATE movies
            SET rating = :rating, awards = :awards, release_date = :release_date, length = :length, genre_id = :genre_id
            WHERE title = :title";
}

$stmt = $db->prepare($sql);

$stmt->bindValue(':title', $title);
$stmt->bindValue(':rating', $rating);
$stmt->bindValue(':awards', $awards);
$stmt->bindValue(':release_date', $release_date);
$stmt->bindValue(':length', $length);
$stmt->bindValue(':genre_id', $genre_id);

$stmt->execute();

header('Location: agregarPelicula.php');
