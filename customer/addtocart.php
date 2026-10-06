<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require_once __DIR__ . "/data.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: product.php");
    exit;
}

$id = filter_var($_POST["id"] ?? null, FILTER_VALIDATE_INT);
if (!$id || $id < 1) {
    header("Location: product.php");
    exit;
}

$product = getProductsbyID($pdo, $id);
if (!$product) {
    header("Location: product.php");
    exit;
}

if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = [];
}

if (isset($_SESSION["cart"][$id])) {
    $_SESSION["cart"][$id]["qty"]++;
} else {
    $_SESSION["cart"][$id] = [
        "id" => $product["id"],
        "name" => $product["name"],
        "stock" => $product["stock"],
        "price" => $product["price"],
        "color" => $product["color"],
        "category" => $product["category"],
        "brand" => $product["brand"],
        "details" => $product["details"],
        "img_url" => $product["img_url"],
        "qty" => 1,
    ];
}

if (isset($_POST["add"])) {
    header("Location: productoverview.php?id=" . $id);
} else {
    header("Location: product.php");
}
exit;