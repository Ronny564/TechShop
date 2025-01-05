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
function getProductCategory($pdo)
{
    try{
        $sql= "SELECT DISTINCT (category) FROM products";
        $stmt =$pdo->query($sql);
        $category=$stmt->fetchall(PDO::FETCH_ASSOC);
        return $category;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function getProductBrand($pdo)
{
    try{
        $sql= "SELECT DISTINCT (brand) FROM products";
        $stmt =$pdo->query($sql);
        $brand=$stmt->fetchall(PDO::FETCH_ASSOC);
        return $brand;
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
