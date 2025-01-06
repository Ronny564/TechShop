<?php
if(!isset($_SESSION)){
    session_start();
}
require_once "data.php";


if(isset($_POST['id']))
{
    $id=$_POST['id'];
    $productbyID = getProductsbyID($pdo,$id);
    if(isset($_SESSION['cart'][$id]))
    {
        $_SESSION['cart'][$id]['qty']++;
    }
    else{
        $_SESSION['cart'][$id] = [
            'id' => $productbyID['id'],
            'name' => $productbyID['name'],
            'stock' => $productbyID['stock'],
            'price' => $productbyID['price'],
            'color'=>$productbyID['color'],
            'category'=>$productbyID['category'],
            'brand'=>$productbyID['brand'],
            'details'=>$productbyID['details'],
            'img_url' => $productbyID['img_url'],
            'qty' => 1,
        ];
    }
    print_r($_SESSION['cart']);
    foreach($_SESSION['cart']as $record)
    {
        print_r($record);  
    }
    if(isset($_POST['add'])){
        header("Location: productoverview.php?id=$id");
    }
    else{
        header("Location: product.php");
    }
}
// unset($_SESSION['cart'])

?>