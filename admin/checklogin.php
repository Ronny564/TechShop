<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (!isset($_SESSION["admin"])) {
    header("Location: login/index.php");
    exit;
}