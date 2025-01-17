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
            <img src="../img/<?=$productbyID['img_url']?>" alt="Product" class="w-4/5 aspect-[251/171] rounded object-contain mx-auto" />
          </div>
          <!-- <div class="mt-4 flex flex-wrap justify-center gap-4 mx-auto">
            <div class="w-20 h-16 sm:w-24 sm:h-20 flex items-center justify-center rounded p-2 shadow-md cursor-pointer">
              <img src="../img/<?=$productbyID['img_url']?>" alt="Product2" class="w-full object-cover object-top" />
            </div>
            <div class="w-20 h-16 sm:w-24 sm:h-20 flex items-center justify-center rounded p-2 shadow-md cursor-pointer">
              <img src="../img/<?=$productbyID['img_url']?>" alt="Product2" class="w-full object-cover object-top" />
            </div>
            <div class="w-20 h-16 sm:w-24 sm:h-20 flex items-center justify-center rounded p-2 shadow-md cursor-pointer">
              <img src="../img/<?=$productbyID['img_url']?>" alt="Product2" class="w-full object-cover object-top" />
            </div>
            <div class="w-20 h-16 sm:w-24 sm:h-20 flex items-center justify-center rounded p-2 shadow-md cursor-pointer">
              <img src="../img/<?=$productbyID['img_url']?>" alt="Product2" class="w-full object-cover object-top" />
            </div>
          </div> -->
        </div>
        <form action="addtocart.php" method="POST" class="lg:col-span-2">
        <div class="lg:col-span-2">
            <h3 class="text-xl font-bold text-gray-800"><?=$productbyID['name']?></h3>
            <p class="text-sm text-gray-500 mt-2"><?=$productbyID['details']?></p>

            <div class="flex flex-wrap gap-4 mt-6">
              <p class="text-gray-800 text-2xl font-bold">$<?=$productbyID['price']?></p>
              <p class="text-gray-500 text-base"><strike>$1500</strike> <span class="text-sm ml-1">Tax included</span></p>
            </div>

            <div class="mt-6">
              <h3 class="text-xl font-bold text-gray-800">Color: <?=$productbyID['color'] ?></h3>
            </div>
              <div class="flex gap-4 mt-12 max-w-md">
              <a href="checkout.php" type="button" class="text-center w-full px-4 py-2.5 outline-none border border-blue-600 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded">Buy now</a>
              <input type="hidden" name="id" value="<?=$productbyID['id']?>">
              <button type="submit" name="add" class="w-full px-4 py-2.5 outline-none border border-blue-600 bg-gray-600 hover:bg-gray-400 text-white text-sm font-semibold rounded">Add to cart</button>
            </div>
          </div>
        </form>
        
      </div>
   

    <div class="mt-12 shadow-[0_2px_10px_-3px_rgba(169,170,172,0.8)] p-6">
      <h3 class="text-xl font-bold text-gray-800">Product information</h3>
      <div class="product_spec">
      <?php
        // Get the specification text from the database
        $specificationText = $productbyID['specification'];
      
        // Split the paragraph into sentences using regex to capture sentence-ending punctuation (.!?)
        $sentences = preg_split('/(?<=[.?!])\s+/', $specificationText);

        // Check if we have sentences and output them as list items
        if (!empty($sentences)) {
          echo '<ul class=" pl-5 ">';
          foreach ($sentences as $sentence) {
            // Output each sentence as a list item
            echo '<li class="text-black list-disc">' . htmlspecialchars($sentence) . '</li>';
          }
          echo '</ul>';
        } else {
          echo '<p>No specifications available.</p>';
        }
      ?>
    </div>

  </div>
</div>


<?php 
require_once "footer.php";
?>