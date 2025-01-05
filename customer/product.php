<?php
require_once "link.php";
require_once "data.php";
require_once "navbar.php";
$products= getProduct($pdo);
$Category= getProductCategory($pdo);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/product.css">
</head>
<body>
    
    <div class="product_show">
            <div class="product_texts">
                <h1>Gaming Products</h1>
                <p>Imporve your gaming experience with our porducts.</p>
            </div>
            <div class="product_img">
                <img src="img/product.png" alt="">
            </div>
    </div>
   
    <div class="m-10">
      <div class="flex flex-col">
        <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-lg">
          <p class="text-black mb-4 text-2xl">Filter</p>
          <form class="" method="GET" name="search" value="<?php if(isset($_GET['search'])){ echo $_GET['search'];} ?>">
            <div class="relative mb-10 w-full flex  items-center justify-between rounded-md">
            <i class="fa-solid fa-magnifying-glass absolute text-black left-3"></i>
              <!-- <svg class="absolute left-2 block h-5 w-5 text-black" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8" class=""></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65" class=""></line>
              </svg> -->
              <input type="name" name="search" class="text-black h-12 w-full cursor-text rounded-md border border-gray-100 bg-gray-100 py-4 pr-40 pl-12 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" placeholder="Search by name" />
            </div>

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
              <div class="flex flex-col">
                <label for="name" class="text-sm font-medium text-stone-600">Brand</label>
                <input type="text" id="name" placeholder="Type Brand" class="placeholder:text-grey-100 mt-2 block w-full rounded-md border border-gray-100 text-black px-2 py-2 shadow-sm outline-none focus:border-white focus:ring focus:ring-blue-200 focus:ring-opacity-50" />
              </div>
              
              <div class="flex flex-col">
                <label for="manufacturer" class="text-sm font-medium text-stone-600">Category</label>

                <select id="manufacturer" class="mt-2 block w-full rounded-md border border-gray-100 text-black px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" value="<?php ?>">
                <?php foreach($Category as $product):?>
                  <option class="text-black"><?=$product['category']?></option>
                <?php endforeach ?>
                </select>
              </div>
              

              <div class="flex flex-col">
                <label for="date" class="text-sm font-medium text-stone-600">Price</label>
                <input type="price" id="date" placeholder="$0.00" class="placeholder:text-grey-100 mt-2 block w-full cursor-pointer rounded-md border border-gray-100 text-black px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" />
              </div>
            </div>

            <div class="mt-6 grid w-full grid-cols-2 justify-end space-x-4 md:flex">
              <button class="rounded-lg bg-gray-200 px-8 py-2 font-medium text-gray-700 outline-none hover:opacity-80 focus:ring">Reset</button>
              <button class="rounded-lg bg-blue-600 px-8 py-2 font-medium text-white outline-none hover:opacity-80 focus:ring">Search</button>
            </div>
          </form>
        </div>
      </div>
  
    </div>
    <div class="font-[sans-serif] bg-gray-100 mt-5">
        <div class="p-4 mx-auto lg:max-w-7xl md:max-w-4xl sm:max-w-xl max-sm:max-w-sm">
          <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-800 mb-6 sm:mb-10">Products</h2>
          <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 max-xl:gap-4 gap-6">
          <?php foreach($products as $product):?>
            <div class="bg-white rounded p-4 cursor-pointer hover:-translate-y-1 transition-all relative">
              <a href="productoverview.php?id=<?=$product['id']?>" class="mb-4">
                <img src="https://readymadeui.com/images/product9.webp" alt="Product 1"
                  class="aspect-[33/35] w-full object-contain"/>
              </a>

              <form action="addtocart.php" method="POST">
              <div>
                  <div class="flex gap-2">
                    <h5 class="text-base font-bold text-gray-800"><?=$product['name']?></h5>
                    <h6 class="text-base text-gray-800 font-bold ml-auto">$<?=$product['price']?></h6>
                  </div>
                  <p class="text-gray-500 text-[13px] mt-2"><?=$product['color']?></p>
                  <div class="flex items-center gap-2 mt-4">
                    <div
                      class="bg-pink-100 hover:bg-pink-200 w-12 h-9 flex items-center justify-center rounded cursor-pointer" title="Wishlist">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16px" class="fill-pink-600 inline-block" viewBox="0 0 64 64">
                        <path
                          d="M45.5 4A18.53 18.53 0 0 0 32 9.86 18.5 18.5 0 0 0 0 22.5C0 40.92 29.71 59 31 59.71a2 2 0 0 0 2.06 0C34.29 59 64 40.92 64 22.5A18.52 18.52 0 0 0 45.5 4ZM32 55.64C26.83 52.34 4 36.92 4 22.5a14.5 14.5 0 0 1 26.36-8.33 2 2 0 0 0 3.27 0A14.5 14.5 0 0 1 60 22.5c0 14.41-22.83 29.83-28 33.14Z"
                          data-original="#000000"></path>
                      </svg>
                    </div>
                    <input type="hidden" name="id" value="<?=$product['id']?>">
                    <button type="submit" class="text-sm px-2 h-9 font-semibold w-full bg-blue-600 hover:bg-blue-700 text-white tracking-wide ml-auto outline-none border-none rounded">Add to cart</button>
                  </div>
                </div>
              </form>
              
            </div>
            <?php endforeach ?>
          </div>
        </div>
      </div>
    
    
         


    
   
   
    
    
</body>
</html>om