<?php
if(!isset($_SESSION)){
    session_start();
}
require_once "data.php";


if(isset($_POST['id']))
{
    $id=$_POST['id'];
    $productbyID = getProductsbyID($pdo,$id);
    if(isset($_SESSION['wish'][$id]))
    {
        $_SESSION['wish'][$id]['qty']++;
    }
    else{
        $_SESSION['wish'][$id] = [
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
    print_r($_SESSION['wish']);
    foreach($_SESSION['wish']as $record)
    {
        print_r($record);  
    }
    header("Location: product.php");
}
// unset($_SESSION['wish'])

?>