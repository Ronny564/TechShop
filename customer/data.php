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
