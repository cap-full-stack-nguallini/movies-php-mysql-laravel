<?php
include_once("conexion.php");

$idSerie = $_GET["id"];
$sql = "SELECT * FROM series WHERE id = :idSerie";
$stmt = $db->prepare($sql);
$stmt->bindValue(':idSerie', $idSerie);
$stmt->execute();
$serie = $stmt->fetch(PDO::FETCH_ASSOC);

echo "id: " . $serie['id'] . "<br>";
echo "title: " . $serie['title'] . "<br>";
echo "release_date: " . $serie['release_date'] . "<br>";
echo "end_date: " . $serie['end_date'] . "<br>";
