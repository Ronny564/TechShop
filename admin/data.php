<?php 
require_once "../database/PDO.php";
function getProduct($pdo)
{
    try{
        $sql= "SELECT * FROM products";
        $stmt=$pdo->query($sql);
        $products=$stmt->fetchall(PDO::FETCH_ASSOC);
        return $products;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}
function getProductsbyID($pdo,$id)
{
    try{
        $sql="SELECT * FROM products WHERE id=:id";
        $stmt= $pdo->prepare($sql);
        $stmt->bindParam('id',$id);
        $stmt->execute();
        $product=$stmt->fetch(PDO::FETCH_ASSOC);
        return $product;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}
function getCustomer($pdo)
{
    try{
        $sql="SELECT * FROM customers";
        $stmt=$pdo->query($sql);
        $customers=$stmt->fetchall(PDO::FETCH_ASSOC);
        return $customers;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function getCustomersbyID($pdo,$id)
{
    try{
        $sql="SELECT * FROM customers WHERE CusId=:id";
        $stmt= $pdo->prepare($sql);
        $stmt->bindParam('id',$id);
        $stmt->execute();
        $product=$stmt->fetch(PDO::FETCH_ASSOC);
        return $product;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}
?>
