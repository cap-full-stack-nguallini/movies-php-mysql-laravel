<?php
include_once("conexion.php");

$idMovie = $_GET["id"];
$sql = "SELECT * FROM movies WHERE id = :idMovie";
$stmt = $db->prepare($sql);
$stmt->bindValue(':idMovie', $idMovie);
$stmt->execute();
$movie = $stmt->fetch(PDO::FETCH_ASSOC);

echo "id: " . $movie['id'] . "<br>";
echo "title: " . $movie['title'] . "<br>";
echo "rating: " . $movie['rating'] . "<br>";
echo "awards: " . $movie['awards'] . "<br>";
echo "release_date: " . $movie['release_date'] . "<br>";
echo "length: " . $movie['length'] . "<br>";
