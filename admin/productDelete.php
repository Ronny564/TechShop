<?php
require_once("../database/PDO.php");

$id = $_POST['id'];

$sql = "DELETE FROM  products WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":id",  $id);
$stmt->execute();

header("Location: product.php");