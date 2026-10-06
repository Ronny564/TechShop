<?php
require_once __DIR__ . "/connection.php";

$host = getenv("DB_HOST") ?: "localhost";
$dbname = getenv("DB_NAME") ?: "techshop";
$username = getenv("DB_USER") ?: "root";
$password = getenv("DB_PASSWORD") ?: "";
$port = getenv("DB_PORT") ?: "3306";

$connection = new Connection($host, $dbname, $username, $password, $port);
$pdo = $connection->getConnection();
