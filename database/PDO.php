<?php
require_once "connection.php";
$host= "localhost";
$dbname= "techshop";
$username="root";
$password= "";

$connection = new Connection($host,$dbname);
// print_r($connection);
$pdo=$connection->getConnection();
// print_r($pdo); 