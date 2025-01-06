<?php
require_once "navbar.php";
require_once "link.php";
require_once "data.php";

$id=0;
if(isset($_GET['id']))
{
    $id=$_GET['id'];
}
$productbyID= getProductsbyID($pdo,$id);
?>
<div class="font-sans bg-white">
  <div class="p-4 lg:max-w-7xl max-w-4xl mx-auto">
    <div class="grid items-start grid-cols-1 lg:grid-cols-5 gap-12 shadow-[0_2px_10px_-3px_rgba(169,170,172,0.8)] p-6 rounded">
        <div class="lg:col-span-3 w-full lg:sticky top-0 text-center">
          <div class="px-4 py-10 rounded shadow-md relative">
            <img src="https://readymadeui.com/images/laptop5.webp" alt="Product" class="w-4/5 aspect-[251/171] rounded object-cover mx-auto" />
            <button type="button" class="absolute top-4 right-4">
              <svg xmlns="http://www.w3.org/2000/svg" width="20px" fill="#ccc" class="mr-1 hover:fill-[#333]" viewBox="0 0 64 64">
                <path d="M45.5 4A18.53 18.53 0 0 0 32 9.86 18.5 18.5 0 0 0 0 22.5C0 40.92 29.71 59 31 59.71a2 2 0 0 0 2.06 0C34.29 59 64 40.92 64 22.5A18.52 18.52 0 0 0 45.5 4ZM32 55.64C26.83 52.34 4 36.92 4 22.5a14.5 14.5 0 0 1 26.36-8.33 2 2 0 0 0 3.27 0A14.5 14.5 0 0 1 60 22.5c0 14.41-22.83 29.83-28 33.14Z" data-original="#000000"></path>
              </svg>
            </button>
          </div>
          <div class="mt-4 flex flex-wrap justify-center gap-4 mx-auto">
            <div class="w-20 h-16 sm:w-24 sm:h-20 flex items-center justify-center rounded p-2 shadow-md cursor-pointer">
              <img src="https://readymadeui.com/images/laptop2.webp" alt="Product2" class="w-full object-cover object-top" />
            </div>
            <div class="w-20 h-16 sm:w-24 sm:h-20 flex items-center justify-center rounded p-2 shadow-md cursor-pointer">
              <img src="https://readymadeui.com/images/laptop3.webp" alt="Product2" class="w-full object-cover object-top" />
            </div>
            <div class="w-20 h-16 sm:w-24 sm:h-20 flex items-center justify-center rounded p-2 shadow-md cursor-pointer">
              <img src="https://readymadeui.com/images/laptop4.webp" alt="Product2" class="w-full object-cover object-top" />
            </div>
            <div class="w-20 h-16 sm:w-24 sm:h-20 flex items-center justify-center rounded p-2 shadow-md cursor-pointer">
              <img src="https://readymadeui.com/images/laptop5.webp" alt="Product2" class="w-full object-cover object-top" />
            </div>
          </div>
        </div>
        <form action="addtocart.php" method="POST" class="lg:col-span-2">
        <div class="lg:col-span-2">
            <h3 class="text-xl font-bold text-gray-800"><?=$productbyID['name']?></h3>
            <p class="text-sm text-gray-500 mt-2">The Acer Aspire Pro 12 is a sleek and powerful laptop, designed for productivity and performance. Perfect for professionals and multitaskers.</p>

            <div class="flex flex-wrap gap-4 mt-6">
              <p class="text-gray-800 text-2xl font-bold">$<?=$productbyID['price']?></p>
              <p class="text-gray-500 text-base"><strike>$1500</strike> <span class="text-sm ml-1">Tax included</span></p>
            </div>

            <div class="mt-6">
              <h3 class="text-xl font-bold text-gray-800">Color: <?=$productbyID['color'] ?></h3>
            </div>
              <div class="flex gap-4 mt-12 max-w-md">
              <button type="button" class="w-full px-4 py-2.5 outline-none border border-blue-600 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded">Buy now</button>
              <input type="hidden" name="id" value="<?=$productbyID['id']?>">
              <button type="submit" name="add" class="w-full px-4 py-2.5 outline-none border border-blue-600 bg-gray-600 hover:bg-gray-400 text-white text-sm font-semibold rounded">Add to cart</button>
            </div>
          </div>
        </form>
        
      </div>
   

    <div class="mt-12 shadow-[0_2px_10px_-3px_rgba(169,170,172,0.8)] p-6">
      <h3 class="text-xl font-bold text-gray-800">Product information</h3>
      <ul class="mt-4 space-y-6 text-gray-800">
        <li class="text-sm text-black">TYPE <span class="text-black ml-4 float-right">LAPTOP</span></li>
        <li class="text-sm text-black">RAM <span class="text-black ml-4 float-right">16 BG</span></li>
        <li class="text-sm text-black">SSD <span class="text-black ml-4 float-right">1000 BG</span></li>
        <li class="text-sm text-black">PROCESSOR TYPE <span class="text-black ml-4 float-right">INTEL CORE I7-12700H</span></li>
        <li class="text-sm text-black">PROCESSOR SPEED <span class="text-black ml-4 float-right">2.3 - 4.7 GHz</span></li>
        <li class="text-sm text-black">DISPLAY SIZE INCH <span class="text-black ml-4 float-right">16.0</span></li>
        <li class="text-sm text-black">DISPLAY SIZE SM <span class="text-black ml-4 float-right">40.64 cm</span></li>
        <li class="text-sm text-black">DISPLAY TYPE <span class="text-black ml-4 float-right">OLED, TOUCHSCREEN, 120 Hz</span></li>
        <li class="text-sm text-black">DISPLAY RESOLUTION <span class="text-black ml-4 float-right">2880x1620</span></li>
      </ul>
    </div>

  </div>
</div>