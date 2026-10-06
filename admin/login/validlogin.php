<?php
require_once __DIR__ . "/../../database/PDO.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}

$email = trim($_POST["email"] ?? "");
$password = $_POST["password"] ?? "";

$stmt = $pdo->prepare("SELECT * FROM admins WHERE email = :email AND password = :password");
$stmt->execute([":email" => $email, ":password" => $password]);
$admin = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$admin) {
    header("Location: index.php?login=failed");
    exit;
}

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
$_SESSION["admin"] = $admin;
header("Location: ../index.php");
exit;