<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require_once __DIR__ . "/../database/PDO.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: product.php");
    exit;
}

if (!isset($_SESSION["user"]["CusId"])) {
    header("Location: login.php");
    exit;
}

$productId = filter_var($_POST["id"] ?? null, FILTER_VALIDATE_INT);
if (!$productId || $productId < 1) {
    header("Location: product.php");
    exit;
}

try {
    $productStmt = $pdo->prepare("SELECT id FROM products WHERE id = :ProductID");
    $productStmt->execute([":ProductID" => $productId]);
    if (!$productStmt->fetchColumn()) {
        header("Location: product.php");
        exit;
    }

    $userId = $_SESSION["user"]["CusId"];
    $wishlistStmt = $pdo->prepare(
        "SELECT id FROM wishlist WHERE CusId = :CusId AND ProductID = :ProductID"
    );
    $wishlistStmt->execute([":CusId" => $userId, ":ProductID" => $productId]);

    if (!$wishlistStmt->fetchColumn()) {
        $insertStmt = $pdo->prepare(
            "INSERT INTO wishlist (CusId, ProductID) VALUES (:CusId, :ProductID)"
        );
        $insertStmt->execute([":CusId" => $userId, ":ProductID" => $productId]);
    }

    header("Location: product.php");
    exit;
} catch (PDOException $error) {
    error_log("Wishlist update failed: " . $error->getMessage());
    header("Location: product.php");
    exit;
}