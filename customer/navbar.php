<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["logout"])) {
    unset($_SESSION["user"], $_SESSION["cart"]);
    header("Location: index.php");
    exit;
}

require_once __DIR__ . "/../database/PDO.php";

$qty = 0;
foreach ($_SESSION["cart"] ?? [] as $record) {
    $qty += (int) ($record["qty"] ?? 0);
}

$wish_qty = 0;
if (isset($_SESSION["user"]["CusId"])) {
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM wishlist WHERE CusId = :CusId");
    $stmt->execute([":CusId" => $_SESSION["user"]["CusId"]]);
    $wish_qty = (int) $stmt->fetchColumn();
    $user = $_SESSION["user"];
}

require_once __DIR__ . "/link.php";
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
        <a href="contact.php"><li>Contact</li></a>
        <a href="aboutus.php"><li>About us</li></a>  
    </div>
    <div class="nav_logo">
        <a href="#home">Tech Shop</a>
    </div>
    <div class="nav_links">
        <a href="index.php"><li>Home</li></a>
        <a href="product.php"><li>Products</li></a>
        <a href="contact.php"><li>Contact</li></a>
        <a href="aboutus.php"><li>About us</li></a>
    </div>
    <div class="nav_right">
        <form action="productfilter.php" method="GET">
        <div class="searchBox">
            <i class="fa-solid fa-magnifying-glass"></i>
            <div class="input_box">
                <input type="text" name="search" placeholder="Search...">
            </div>
        </div>
        </form>
       
        <?php if(isset($_SESSION['user'])){?>
        
            <div class="logout">
            <a href="#"><?=$_SESSION['user']['name']?><i class="fa-solid fa-caret-down ml-2"></i></a>
                <div class="drop_down">
                    <ul>
                        <li><a href="profiledetail.php">Profile</a></li>
                        <li><a href="#">Setting</a></li>
                        <form method="POST">
                        <li><button type="submit" name="logout">Log Out</button></li>
                        </form>
                    </ul>
                </div>
            </div>
        
        <?php }else{?>
            <div class="user">
            <a href="login.php"><i class="fa-solid fa-user"></i></a>
        </div>
        <?php } ?>
        <div class="cart ml-6 w-14 h-8 rounded-full border-2 border-white flex justify-center items-center pr-1">
            <a href="wish.php" class=""><i class="fa-solid fa-heart"><sub class="pl-1"><?=$wish_qty?></sub></i></a>
        </div>
        <div class="cart ml-6 w-14 h-8 rounded-full border-2 border-white flex justify-center items-center pr-1">
            <a href="cart.php" class=""><i class="fa-solid fa-cart-shopping"><sub class="pl-1"><?= $qty?></sub></i></a>
        </div>
    </div>
</nav>
<script src="./js/nabar.js"></script>