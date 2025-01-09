<?php
require_once("../database/PDO.php");

$id = $_POST['id'];

$sql = "DELETE FROM  customers WHERE CusId=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":id",  $id);
$stmt->execute();

header("Location: customer.php");