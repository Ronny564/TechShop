<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$id = filter_var($_POST["id"] ?? null, FILTER_VALIDATE_INT);
if (!$id || $id < 1 || !isset($_SESSION["cart"][$id])) {
    header("Location: cart.php");
    exit;
}

if (isset($_POST["increase"])) {
    $stock = (int) ($_SESSION["cart"][$id]["stock"] ?? 0);
    if ($_SESSION["cart"][$id]["qty"] < $stock) {
        $_SESSION["cart"][$id]["qty"]++;
    }
} elseif (isset($_POST["decrease"])) {
    if ($_SESSION["cart"][$id]["qty"] <= 1) {
        unset($_SESSION["cart"][$id]);
    } else {
        $_SESSION["cart"][$id]["qty"]--;
    }
} elseif (isset($_POST["remove"])) {
    unset($_SESSION["cart"][$id]);
}

header("Location: cart.php");
exit;