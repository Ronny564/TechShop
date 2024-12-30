<?php
require_once"PDO.php";
function createProductTable($pdo){
    $query="Create table if not exists products
    (id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    stock INT DEFAULT 1,
    price FLOAT,
    color VARCHAR(255) NOT NULL,
    category VARCHAR(255) NOT NULL,
    brand VARCHAR(255) NOT NULL,
    specification VARCHAR(500),
    img_url TEXT
    )";
    try{
        $pdo->query($query);
        echo"product table created <br>";
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
}
function createAdminTable($pdo){
    $query= "Create table if not exists admin
    (id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    email TEXT NOT NULL UNIQUE,
    password TEXT NOT NULL,
    img_url TEXT
    )";
    try{
        $pdo->query($query);
        echo"users table created<br>";
    }
    catch(PDOException $e){
         echo $e->getMessage();}
}
// function createCustomerTable(PDO $pdo){
//     $query= "Create table if not exists customers
//     (id INT PRIMARY KEY AUTO_INCREMENT,
//     name VARCHAR(50) NOT NULL,
//     email TEXT NOT NULL UNIQUE,
//     password TEXT NOT NULL
//     )";
//     try{
//         $pdo->exec($query);
//         echo"customers table created<br>";
//       }
//     catch(PDOException $e){
//          echo $e->getMessage();}
    
// }
createProductTable($pdo);
createAdminTable($pdo);
// createCustomerTable($pdo);
