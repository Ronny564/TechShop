<?php
require_once "link.php";
require_once "data.php";
require_once "navbar.php";

// Fetch all products, brands, and categories
$productbyCat = getProductCategory($pdo);
$productbyBrand = getProductBrand($pdo);
$allProducts = getProduct($pdo);

// Check if there's a search query
$searchQuery = isset($_GET['search']) ? trim($_GET['search']) : '';

// Check if there are filter parameters
$selectedBrands = isset($_GET['brand']) ? $_GET['brand'] : [];
$selectedCategories = isset($_GET['category']) ? $_GET['category'] : [];
$minPrice = isset($_GET['minPrice']) ? (float)$_GET['minPrice'] : null;
$maxPrice = isset($_GET['maxPrice']) ? (float)$_GET['maxPrice'] : null;

// Filter products based on the search query, brand, category, and price range
$products = array_filter($allProducts, function($product) use ($searchQuery, $selectedBrands, $selectedCategories, $minPrice, $maxPrice) {
    // Match search query
    $matchesSearch = empty($searchQuery) || stripos($product['name'], $searchQuery) !== false;

    // Match selected brands
    $matchesBrand = empty($selectedBrands) || in_array($product['brand'], $selectedBrands);

    // Match selected categories
    $matchesCategory = empty($selectedCategories) || in_array($product['category'], $selectedCategories);

    // Match price range
    $matchesPrice = true;
    if ($minPrice !== null && $product['price'] < $minPrice) {
        $matchesPrice = false;
    }
    if ($maxPrice !== null && $product['price'] > $maxPrice) {
        $matchesPrice = false;
    }

    // Return true only if all conditions are met
    return $matchesSearch && $matchesBrand && $matchesCategory && $matchesPrice;
});
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
            <p>Improve your gaming experience with our products.</p>
        </div>
        <div class="product_img">
            <img src="../img/product.png" alt="">
        </div>
    </div>
    <section class="py-10 relative">
        <div class="max-w-full px-4 md:px-8 text-center">
            <h1 class="text-black text-3xl">Products</h1>
            <svg class="my-7 w-full" xmlns="http://www.w3.org/2000/svg" width="1216" height="2" viewBox="0 0 1216 2"
                fill="none">
                <path d="M0 1H1216" stroke="#E5E7EB" />
            </svg>
            <form method="GET">
                <div class="grid grid-cols-12">
                    <!-- Filter -->
                    <div class="col-span-12 md:col-span-3 w-full max-md:max-w-md max-md:mx-auto">
                        <div class="box rounded-xl border border-gray-300 bg-white p-6 w-full md:max-w-sm">
                            <div class="flex items-center justify-between w-full pb-3 border-b border-gray-200 mb-7">
                                <p class="font-medium text-base leading-7 text-black ">Filter Plans</p>
                            </div>
                            <!-- Price Filter -->
                            <label for="Offer" class="font-medium text-sm leading-6 text-gray-600 mb-1">Price</label>
                            
                            <label for="minPrice" class="font-medium text-sm leading-6 text-gray-600 mb-1">Min Price</label>
                            <input type="number" id="minPrice" name="minPrice" placeholder="Min" class="text-black w-full p-2 border border-gray-300 rounded-md mb-3">

                            <label for="maxPrice" class="font-medium text-sm leading-6 text-gray-600 mb-1">Max Price</label>
                            <input type="number" id="maxPrice" name="maxPrice" placeholder="Max" class="text-black w-full p-2 border border-gray-300 rounded-md mb-3">
                            <hr class="text-black m-3">
                            <p class="font-medium text-sm leading-6 text-black mb-3">Brand</p>
                            <div class="box flex flex-col gap-2">
                                <?php foreach($productbyBrand as $product):?>
                                <div class="flex items-center">
                                    <input id="checkbox-brand-<?= $product['brand'] ?>" type="checkbox" name="brand[]" value="<?= $product['brand'] ?>" class="w-5 h-5 appearance-none border border-gray-300  rounded-md mr-2 hover:border-indigo-500 hover:bg-indigo-100 checked:bg-no-repeat checked:bg-center checked:border-indigo-500 checked:bg-indigo-100 checked:bg-[url('https://pagedone.io/asset/uploads/1689406942.svg')]">
                                    <label for="checkbox-brand-<?= $product['brand'] ?>" class="text-xs font-normal text-gray-600 leading-4 cursor-pointer"><?= $product['brand'] ?></label>
                                </div>
                                <?php endforeach?>
                            </div>
                            <hr class="text-black m-3">
                            <p class="font-medium text-sm leading-6 text-black mb-3">Category</p>
                            <div class="box flex flex-col gap-2">
                                <?php foreach($productbyCat as $product):?>
                                <div class="flex items-center">
                                    <input id="checkbox-category-<?= $product['category'] ?>" type="checkbox" name="category[]" value="<?= $product['category'] ?>" class="w-5 h-5 appearance-none border border-gray-300  rounded-md mr-2 hover:border-indigo-500 hover:bg-indigo-100 checked:bg-no-repeat checked:bg-center checked:border-indigo-500 checked:bg-indigo-100 checked:bg-[url('https://pagedone.io/asset/uploads/1689406942.svg')]">
                                    <label for="checkbox-category-<?= $product['category'] ?>" class="text-xs font-normal text-gray-600 leading-4 cursor-pointer"><?= $product['category'] ?></label>
                                </div>
                                <?php endforeach ?>
                            </div> 
                            <button type="submit" class="text-sm px-2 h-9 mt-6 font-semibold w-full bg-blue-600 hover:bg-blue-700 text-white tracking-wide ml-auto outline-none border-none rounded">Filter</button>
                        </div>
                    </div>
             </form>
                    <!-- Product -->
                    <div class="col-span-12 md:col-span-9">
                        <div class="font-[sans-serif] bg-gray-100">
                            <div class="p-4 mx-auto lg:max-w-7xl md:max-w-4xl sm:max-w-xl max-sm:max-w-sm">
                                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 max-xl:gap-4 gap-6">
                                    <?php if ($products): ?>
                                        <?php foreach ($products as $product): ?>
                                            <div class="bg-white rounded p-4 cursor-pointer hover:-translate-y-1 transition-all relative">
                                                <a href="productoverview.php?id=<?= $product['id'] ?>" class="mb-4">
                                                    <img src="../img/<?= $product['img_url'] ?>" alt="<?= $product['name'] ?>" class="aspect-[33/35] w-full object-cover" />
                                                </a>
                                                <div>
                                                    <div class="flex gap-2">
                                                        <h5 class="text-base font-bold text-black text-left"><?= $product['name'] ?></h5>
                                                        <h6 class="text-base text-gray-800 font-bold ml-auto">$<?= $product['price'] ?></h6>
                                                    </div>
                                                    <div class="flex justify-between">
                                                        <div class="flex">
                                                            <p class="text-black text-[15px] mt-2 font-bold">Color:</p>
                                                            <p class="text-black text-[15px] mt-2 ml-2"><?= $product['color'] ?></p>
                                                        </div>
                
                                                        <a href="#" class=""><i class="fa-solid fa-heart text-white bg-black p-2 border-black rounded-full"></i></a>
                                                    </div>

                                                    <!-- addtocart -->
                                                    <form action="addtocart.php" method="POST" class="mt-3">
                                                        <input type="hidden" name="id" value="<?=$product['id']?>">
                                                        <button type="submit" class="text-sm px-2 h-9 font-semibold w-full bg-blue-600 hover:bg-blue-700 text-white tracking-wide ml-auto outline-none border-none rounded">Add to cart</button>
                                                    </form>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <p class="text-black">Search Product Not Found</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- </form> -->
        </div>
    </section>
</body>
</html>
