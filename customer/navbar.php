<?php
require_once "link.php";
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
        <a href=""><li>Home</li></a>
        <a href=""><li>Products</li></a>
        <a href=""><li>Contact</li></a>
        <a href=""><li>About us</li></a>  
    </div>
    <div class="nav_logo">
        <a href="#home">Tech Shop</a>
    </div>
    <div class="nav_links">
        <a href=""><li>Home</li></a>
        <a href=""><li>Products</li></a>
        <a href=""><li>Contact</li></a>
        <a href=""><li>About us</li></a>
    </div>
    <div class="nav_right">
        <div class="searchBox">
            <i class="fa-solid fa-magnifying-glass"></i>
            <div class="input_box">
                <input type="text" placeholder="Search...">
            </div>
        </div>
        <div class="user">
            <a href=""><i class="fa-solid fa-user"></i></a>
        </div>
            
    </div>
</nav>
<script src="./js/nabar.js"></script>