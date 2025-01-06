<?php
if(!isset($_SESSION['cart']))
{
    session_start();
}
$id=$_POST['id'];
echo $id;
if(isset($_POST['increase']))
{
    $_SESSION['cart'][$id]['qty']++;
}
if(isset($_POST['decrease']))
{
    if($_SESSION['cart'][$id]['qty']<=1){
        unset($_SESSION['cart'][$id]);
    }
    else{
        $_SESSION['cart'][$id]['qty']--;
    }   
}
if(isset($_POST['remove']))
{
    unset($_SESSION['cart'][$id]);
}
header("Location: cart.php");
?>