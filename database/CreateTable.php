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
    details TEXT,
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
    (AdminId INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    email TEXT NOT NULL UNIQUE,
    password TEXT NOT NULL
    )";
    try{
        $pdo->query($query);
        echo"admin table created<br>";
    }
    catch(PDOException $e){
         echo $e->getMessage();}
}
function createCustomerTable(PDO $pdo){
    $query= "Create table if not exists customers
    (CusId INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    email TEXT NOT NULL UNIQUE,
    password TEXT NOT NULL
    )";
    try{
        $pdo->exec($query);
        echo"customers table created<br>";
      }
    catch(PDOException $e){
         echo $e->getMessage();}
    
}
// function createOrderTable()
// {
//     $query= "CREATE TABLE IF NOT EXISTS order
//     (OrderId INT AUTO INCREMENT,
//     PRIMARY KEY (OrderId),
//     FOREIGN KEY (CusID) REFERENCES customers(CusID),
//     FOREIGN KEY (id) REFERENCES products(id)
//     )";
// }
createProductTable($pdo);
createAdminTable($pdo);
createCustomerTable($pdo);
