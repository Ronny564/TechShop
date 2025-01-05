<?php
require_once "link.php";

if(!isset($_SESSION)){
    session_start();
}
  $qty=0;
  if(isset($_SESSION['cart']))
  {
    foreach($_SESSION['cart'] as $record)
    {
      // print_r($record);echo "<br>";
      $qty += $record['qty'];
    }
  }


if(isset($_SESSION['user']))
{
    $user =$_SESSION['user'];
};
function logout()
{
    if(isset($_SESSION["user"]))
    {
        unset($_SESSION["user"]);
    }
}
if($_SERVER['REQUEST_METHOD'] === "POST"){
    logout();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechShop</title>
</head>
</html>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="stylesheet" href="./css/navbar.css">
<nav class="nav_bar">
    <div class="toogle_btn">
        <i class="fa-solid fa-bars"></i>
    </div>
    <div class="dropdown_menu">
        <a href="index.php"><li>Home</li></a>
        <a href="product.php"><li>Products</li></a>
        <a href=""><li>Contact</li></a>
        <a href=""><li>About us</li></a>  
    </div>
    <div class="nav_logo">
        <a href="#home">Tech Shop</a>
    </div>
    <div class="nav_links">
        <a href="index.php"><li>Home</li></a>
        <a href="product.php"><li>Products</li></a>
        <a href=""><li>Contact</li></a>
        <a href=""><li>About us</li></a>
    </div>
    <div class="nav_right">
        <!-- <div class="searchBox">
            <i class="fa-solid fa-magnifying-glass"></i>
            <div class="input_box">
                <input type="text" placeholder="Search...">
            </div>
        </div> -->
       
        <?php if(isset($_SESSION['user'])){?>
        <form method="POST">
            <div class="logout">
            <a href=""><?=$_SESSION['user']['name']?><i class="fa-solid fa-caret-down ml-2"></i></a>
                <div class="drop_down">
                    <ul>
                        <li><a href="profiledetail.php">Profile</a></li>
                        <li><a href="">Setting</a></li>
                        <li><button>Log Out</button></li>
                    </ul>
                </div>
            </div>
        </form>
        <?php }else{?>
            <div class="user">
            <a href="login.php"><i class="fa-solid fa-user"></i></a>
        </div>
        <?php } ?>
        
        <div class="cart ml-6 w-14 h-8 rounded-full border-2 border-white flex justify-center items-center pr-1">
            <a href="" class=""><i class="fa-solid fa-cart-shopping"><sub class="pl-1"><?= $qty?></sub></i></a>
        </div>
    </div>
</nav>
<script src="./js/nabar.js"></script>