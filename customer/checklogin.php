<?php
require_once __DIR__ . "/../database/PDO.php";

function login(PDO $pdo, string $email, string $password): array
{
    $sql = "SELECT * FROM customers WHERE email = :email AND password = :password";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ":email" => trim($email),
        ":password" => $password,
    ]);

    $customer = $stmt->fetch(PDO::FETCH_ASSOC);
    return $customer ?: [];
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: login.php");
    exit;
}

$email = $_POST["email"] ?? "";
$password = $_POST["password"] ?? "";

if ($email === "" || $password === "") {
    header("Location: login.php?login=failed");
    exit;
}

$customer = login($pdo, $email, $password);
if ($customer) {
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    $_SESSION["user"] = $customer;
    header("Location: index.php");
    exit;
}

header("Location: login.php?login=failed");
exit;