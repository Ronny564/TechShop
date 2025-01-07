<?php
require_once "link.php";
require_once "data.php";
require_once "navbar.php";
$productbyCat=getProductCategory($pdo);
$productbyBrand=getProductBrand($pdo);
// Fetch all products from the database or data source
$allProducts = getProduct($pdo); // Assuming $products contains all products

// Check if there's a search query
$searchQuery = isset($_GET['search']) ? trim($_GET['search']) : '';

// Filter products based on the search query
if (!empty($searchQuery)) {
    $products = array_filter($allProducts, function($product) use ($searchQuery) {
        return stripos($product['name'], $searchQuery) !== false;
    });
} else {
    $products = $allProducts; // Show all products if no search query
}
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
            <div class="grid grid-cols-12">
            <!-- Filter -->
            <div class="col-span-12 md:col-span-3 w-full max-md:max-w-md max-md:mx-auto">
                    <div class="box rounded-xl border border-gray-300 bg-white p-6 w-full md:max-w-sm">
                        <div class="flex items-center justify-between w-full pb-3 border-b border-gray-200 mb-7">
                            <p class="font-medium text-base leading-7 text-black ">Filter Plans</p>
                        </div>
                        <div class="w-full mb-7">
                            <div class='accordion-group grid grid-cols-1 gap-5 sm:gap-9'
                                data-accordion="default-accordion">
                                <div class='accordion '
                                    id='category-heading-one'>
                                    <button
                                        class='accordion-toggle group accordion-active:text-indigo-600 inline-flex items-center justify-between leading-8 text-gray-600 w-full transition duration-500 hover:text-indigo-600 active:text-indigo-600'
                                        aria-controls='category-collapse-one'>
                                        <h5 class="font-medium text-sm text-gray-900">
                                            Availability
                                        </h5>
                                        <svg class='text-gray-900 transition duration-500 group-hover:text-indigo-600 accordion-active:text-indigo-600 accordion-active:rotate-180'
                                            width='22' height='22' viewBox='0 0 22 22' fill='none'
                                            xmlns='http://www.w3.org/2000/svg'>
                                            <path
                                                d='M16.5 8.25L12.4142 12.3358C11.7475 13.0025 11.4142 13.3358 11 13.3358C10.5858 13.3358 10.2525 13.0025 9.58579 12.3358L5.5 8.25'
                                                stroke='currentColor' stroke-width='1.6' stroke-linecap='round'
                                                stroke-linejoin='round'></path>
                                        </svg>

                                    </button>
                                    <div id='category-collapse-one'
                                        class='accordion-content w-full px-0 overflow-hidden pr-4 max-h-0 '
                                        aria-labelledby='category-heading-one'>
                                        
                                        <div class="box flex flex-col gap-2 mt-5">
                                           
                                            <div class="flex items-center mb-2">
                                                <input id="checkbox-option-1" type="checkbox" value="" class="checkbox-white w-5 h-5 appearance-none border border-gray-500  rounded mr-1 hover:border-indigo-100 hover:bg-indigo-600 checked:bg-no-repeat checked:bg-center checked:border-indigo-100 checked:bg-indigo-600 checked:bg-[url('https://pagedone.io/asset/uploads/1689406942.svg')]">
                                                <label for="checkbox-option-1" class="ml-1 font-normal text-xs cursor-pointer  text-gray-600">option-1</label>
                                                </div>
                                                <div class="flex items-center mb-2">
                                                    <input id="checkbox-option-2" type="checkbox" value="" class="checkbox-white w-5 h-5 appearance-none border border-gray-500  rounded mr-1 hover:border-indigo-100 hover:bg-indigo-600 checked:bg-no-repeat checked:bg-center checked:border-indigo-600 checked:bg-indigo-100 checked:bg-[url('https://pagedone.io/asset/uploads/1689406942.svg')]">
                                                    <label for="checkbox-option-2" class="ml-1 font-normal text-xs cursor-pointer  text-gray-600">option-2</label>
                                                    </div>
                                                    <div class="flex items-center mb-2">
                                                        <input id="checkbox-option-3" type="checkbox" value="" class="checkbox-white w-5 h-5 appearance-none border border-gray-500  rounded mr-1 hover:border-indigo-600 hover:bg-indigo-600 checked:bg-no-repeat checked:bg-center checked:border-indigo-600 checked:bg-indigo-100 checked:bg-[url('https://pagedone.io/asset/uploads/1689406942.svg')]">
                                                        <label for="checkbox-option-3" class="ml-1 font-normal text-xs cursor-pointer  text-gray-600">option-3</label>
                                                        </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <label for="Offer" class="font-medium text-sm leading-6 text-gray-600 mb-1">Offer</label>
                        <div class="relative w-full mb-7">
                            <select id="Offer"
                                class="h-12 border border-gray-300 text-gray-900 text-xs font-medium rounded-full block w-full py-2.5 px-4 appearance-none relative focus:outline-none bg-white">
                                <option selected>5% off upi discount</option>
                                <option value="option 1">option 1</option>
                                <option value="option 2">option 2</option>
                                <option value="option 3">option 3</option>
                                <option value="option 4">option 4</option>
                            </select>
                        </div>
                        <hr class="text-black m-3">
                        <p class="font-medium text-sm leading-6 text-black mb-3">Brand</p>
                        <div class="box flex flex-col gap-2">
                            <?php foreach($productbyBrand as $product):?>
                            <div class="flex items-center">
                                <input id="checkbox-default-1" type="checkbox" value="" class="w-5 h-5 appearance-none border border-gray-300  rounded-md mr-2 hover:border-indigo-500 hover:bg-indigo-100 checked:bg-no-repeat checked:bg-center checked:border-indigo-500 checked:bg-indigo-100 checked:bg-[url('https://pagedone.io/asset/uploads/1689406942.svg')]">
                                <label for="checkbox-default-1" class="text-xs font-normal text-gray-600 leading-4 cursor-pointer"><?=$product['brand']?></label>
                            </div>
                            <?php endforeach?>
                        </div>
                        <hr class="text-black m-3">
                        <p class="font-medium text-sm leading-6 text-black mb-3">Category</p>
                        <div class="box flex flex-col gap-2">
                            <?php foreach($productbyCat as $product):?>
                            <div class="flex items-center">
                                <input id="checkbox-default-1" type="checkbox" value="" class="w-5 h-5 appearance-none border border-gray-300  rounded-md mr-2 hover:border-indigo-500 hover:bg-indigo-100 checked:bg-no-repeat checked:bg-center checked:border-indigo-500 checked:bg-indigo-100 checked:bg-[url('https://pagedone.io/asset/uploads/1689406942.svg')]">
                                <label for="checkbox-default-1" class="text-xs font-normal text-gray-600 leading-4 cursor-pointer"><?=$product['category'] ?></label>
                            </div>
                            <?php endforeach ?>
                        </div> 
                        <button type="submit" class="text-sm px-2 h-9 mt-6 font-semibold w-full bg-blue-600 hover:bg-blue-700 text-white tracking-wide ml-auto outline-none border-none rounded">Filter</button>
                    </div>
                </div>
                <!-- Product -->
                <div class="col-span-12 md:col-span-9">
                    <div class="font-[sans-serif] bg-gray-100">
                        <div class="p-4 mx-auto lg:max-w-7xl md:max-w-4xl sm:max-w-xl max-sm:max-w-sm">
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 max-xl:gap-4 gap-6">
                                <?php if ($products): ?>
                                    <?php foreach ($products as $product): ?>
                                        <div class="bg-white rounded p-4 cursor-pointer hover:-translate-y-1 transition-all relative">
                                            <a href="productoverview.php?id=<?= $product['id'] ?>" class="mb-4">
                                                <img src="https://readymadeui.com/images/product10.webp" alt="<?= $product['name'] ?>"
                                                    class="aspect-[33/35] w-full object-contain" />
                                            </a>
                                            <div>
                                                <div class="flex gap-2">
                                                    <h5 class="text-base font-bold text-black text-left"><?= $product['name'] ?></h5>
                                                    <h6 class="text-base text-gray-800 font-bold ml-auto">$<?= $product['price'] ?></h6>
                                                </div>
                                                <div class="flex">
                                                    <p class="text-black text-[15px] mt-2 font-bold">Color:</p>
                                                    <p class="text-black text-[15px] mt-2 ml-2"><?= $product['color'] ?></p>
                                                </div>
                                                <form action="addtocart.php" method="POST">
                                                    <div class="flex items-center gap-2 mt-4">
                                                        <input type="hidden" name="id" value="<?= $product['id'] ?>">
                                                        <button type="submit" class="text-sm px-2 h-9 font-semibold w-full bg-blue-600 hover:bg-blue-700 text-white tracking-wide ml-auto outline-none border-none rounded">Add to cart</button>
                                                    </div>
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
        </div>
    </section>
</body>
</html>
