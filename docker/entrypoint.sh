#!/bin/sh
set -eu

php -r '
$host = getenv("DB_HOST") ?: "db";
$port = getenv("DB_PORT") ?: "3306";
$name = getenv("DB_NAME") ?: "techshop";
$user = getenv("DB_USER") ?: "techshop";
$password = getenv("DB_PASSWORD") ?: "techshop_local_password";
for ($i = 0; $i < 60; $i++) {
    try {
        new PDO("mysql:host=$host;port=$port;dbname=$name;charset=utf8mb4", $user, $password);
        exit(0);
    } catch (PDOException $e) {
        sleep(2);
    }
}
fwrite(STDERR, "Database did not become ready in time.\n");
exit(1);
'

php database/CreateTable.php
php database/SeedTable.php
exec apache2-foreground
