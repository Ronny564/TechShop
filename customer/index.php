<?php
require_once "navbar.php";
require_once "link.php";
require_once "data.php";
$products=getProduct($pdo);
// print_r($product);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
</head>
<body>

   <!-- Swiper -->
   <div class="main swiper mySwiper">
    <div class="wrapper swiper-wrapper">
      <div class="slide swiper-slide">
        <img class="image" src="./img/G515_Cinderella_Product_Key_Visual_16x9-D.jpg" alt="">
        <div class="image-data">
        <span class="text">
          use the finest product</span>
          <h2>
            Improve your gaming<br />
            experience
          </h2>
        </div>
      </div>
      <div class="slide swiper-slide">
        <img class="image" src="./img/gaming-keyboards-l19fzyb1tjprgevk.jpg" alt="">
        <div class="image-data">
        <span class="text">use the finest product</span>
          <h2>
            Improve your gaming<br />
            experience
          </h2>
        </div>
      </div>
      <div class="slide swiper-slide">
        <img class="image" src="./img/home-featured-overwatch-lg.webp" alt="">
        <div class="image-data">
        <span class="text">use the finest product</span>
          <h2>
            Improve your gaming<br />
            experience
          </h2>
        </div>
      </div>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
  </div>
  <h2 class="cat_head">Product by Category</h2>

    
</body>
</html>


<script src="./js/index.js"></script>
























































