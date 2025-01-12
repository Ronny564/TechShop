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
    specification TEXT,
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
    $query= "Create table if not exists admins
    (AdminId INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    email TEXT NOT NULL UNIQUE,
    address TEXT,
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
    address TEXT NOT NULL,
    password TEXT NOT NULL
    )";
    try{
        $pdo->exec($query);
        echo"customers table created<br>";
      }
    catch(PDOException $e){
         echo $e->getMessage();}
    
}
function createSaleTable($pdo)
{
    $query= "CREATE TABLE IF NOT EXISTS sale (
        SaleId INT AUTO_INCREMENT PRIMARY KEY,
        CusId INT NOT NULL,
        order_date DATETIME DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (CusId) REFERENCES customers(CusId)
    )";
    try{
        $pdo->exec($query);
        echo "sale table created<br>";
    }catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}
function createSaleDetailTable($pdo)
{
    $query="CREATE TABLE IF NOT EXISTS saledetail (
        SaleDetail_ID INT AUTO_INCREMENT PRIMARY KEY,
        saleID INT NOT NULL,
        CusID INT NOT NULL,
        ProductID INT NOT NULL,
        Quantity INT NOT NULL,
        Total_Amount FLOAT,
        Payment_Method TEXT,
        Payment_Detail TEXT,
        FOREIGN KEY (saleID) REFERENCES sale(SaleId),
        FOREIGN KEY (CusID) REFERENCES customers(CusId),
        FOREIGN KEY (ProductID) REFERENCES products(id)
    )";
    try{
        $pdo->exec($query);
        echo "saledetail table created<br>";
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}
function createWishlsitTable($pdo)
{
    $query="CREATE TABLE IF NOT EXISTS wishlist(
    wishId INT AUTO_INCREMENT PRIMARY KEY,
    CusId INT,
    ProductId INT,
    FOREIGN KEY (CusId) REFERENCES customers(CusId),
    FOREIGN KEY (ProductId) REFERENCES products(id)
    )";
    try{
        $pdo->exec($query);
        echo "wishlist table created<br>";
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}
createProductTable($pdo);
createAdminTable($pdo);
createCustomerTable($pdo);
createSaleTable($pdo);
createSaleDetailTable($pdo);
createWishlsitTable($pdo);
