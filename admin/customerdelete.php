<?php
require_once("../database/PDO.php");

$id = $_POST['id'];

$sql1 = "DELETE FROM saledetail WHERE CusID = :id";
$stmt1 = $pdo->prepare($sql1);
$stmt1->bindParam(":id", $id);
$stmt1->execute();

$sql2 = "DELETE FROM sale WHERE CusId = :id";
$stmt2 = $pdo->prepare($sql2);
$stmt2->bindParam(":id", $id);
$stmt2->execute();

$sql3 = "DELETE FROM wishlist WHERE CusId = :id";
$stmt3 = $pdo->prepare($sql3);
$stmt3->bindParam(":id", $id);
$stmt3->execute();

$sql = "DELETE FROM customers WHERE CusId = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":id", $id);
$stmt->execute();

header("Location: customer.php");