<?php
require_once "link.php";
require_once "sidebar.php";
require_once "../database/PDO.php";
require_once "data.php";

$id= $_GET['id'];
$product = getProductsbyID($pdo, $id);
 ?>

<main class="mt-40 md:mt-0 md:ml-64 p-4 w--80 flex items-center justify-center">
    <!-- container-->
    <div class="container bg-gray-100 rounded-lg px-10 py-4">
        <?php if(isset($_GET['status']) && $_GET['status']=='success'){ ?>
        <p class="text-green-300">Product Update successful</p>
        <?php }?>
        <p class="text-3xl mb-3 font-bold">Product Update Form</p>
        <form action="ProductUpdateAction.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?=$id?>">
            <div class="mb-4">
                <label for="" class="text-xl">Product Name </label>
                <div class="relative mt-2">
                    <input
                    name="product_name"
                    type="text" 
                    value="<?=$product['name']?>" 
                    placeholder="Enter Product Name" 
                    class="px-2 py-2 border border-grey-600 rounded-md w-full pl-9">
                    <i class="fa-solid fa-layer-group absolute left-0 top-1/2 -translate-y-1/2 ml-4"></i>
                </div>
                <?= isset($_GET['validation'])? '<p class="text-red-500" > Empty fields</p>' :null ?>
            </div>
            <div class="mb-4">
                <label for="" class="text-xl">Product Stock</label>
                <div class="relative mt-2">
                    <input 
                    name="product_stock"
                    type="number"
                    value="<?=$product['stock']?>"
                    min="1"
                    step="1"
                    placeholder="Enter Product Name" class=" px-2 py-2 border border-grey-600 rounded-md w-full pl-9">
                    <i class="fa-solid fa-arrow-trend-up absolute left-0 top-1/2 -translate-y-1/2 ml-4"></i>
                </div>
                <?= isset($_GET['validation'])? '<p class="text-red-500" > Empty fields</p>' :null ?>
            </div>
            <div class="mb-4">
                <label for="" class="text-xl">Product Price</label>
                <div class="relative mt-2">
                    <input 
                    name="product_price"
                    type="number" 
                    value="<?= $product['price']?>"
                    min="0"
                    step="0.01"
                    placeholder="Enter Product Price" 
                    class=" px-2 py-2 border border-grey-600 rounded-md w-full pl-9">
                    <i class="fa-solid fa-dollar-sign absolute left-0 top-1/2 -translate-y-1/2 ml-4"></i>
                </div>
                <?= isset($_GET['validation'])? '<p class="text-red-500" > Empty fields</p>' :null ?>
            </div>
            <div class="mb-4">
                <label for="" class="text-xl">Product Color </label>
                <div class="relative mt-2">
                    <input name="product_color"
                    type="text" 
                    value="<?= $product['color']?>" 
                    placeholder="Enter Product Color" 
                    class="px-2 py-2 border border-grey-600 rounded-md w-full pl-9">
                    <i class="fa-solid fa-droplet absolute left-0 top-1/2 -translate-y-1/2 ml-4"></i>
                </div>
                <?= isset($_GET['validation'])? '<p class="text-red-500" > Empty fields</p>' :null ?>
            </div>
            <div class="mb-4">
                <label for="" class="text-xl">Product Category </label>
                <div class="relative mt-2">
                    <input name="product_category"
                    type="text" 
                    value="<?= $product['category']?>" 
                    placeholder="Enter Product Color" 
                    class="px-2 py-2 border border-grey-600 rounded-md w-full pl-9">
                    <i class="fa-solid fa-layer-group absolute left-0 top-1/2 -translate-y-1/2 ml-4"></i>
                </div>
                <?= isset($_GET['validation'])? '<p class="text-red-500" > Empty fields</p>' :null ?>
            </div>
            <div class="mb-4">
                <label for="" class="text-xl">Product brand </label>
                <div class="relative mt-2">
                    <input name="product_brand"
                    type="text" 
                    value="<?= $product['brand']?>" 
                    placeholder="Enter Product Brand" 
                    class="px-2 py-2 border border-grey-600 rounded-md w-full pl-9">
                    <i class="fa-solid fa-layer-group absolute left-0 top-1/2 -translate-y-1/2 ml-4"></i>
                </div>
                <?= isset($_GET['validation'])? '<p class="text-red-500" > Empty fields</p>' :null ?>
            </div>
            <div class="mb-4">
                <label for="" class="text-xl">Product Details </label>
                <div class="relative mt-2">
                    <input name="product_details"
                    type="text" 
                    value="<?= $product['details']?>" 
                    placeholder="Enter Product Brand" 
                    class="px-2 py-2 border border-grey-600 rounded-md w-full pl-9">
                    <i class="fa-solid fa-circle-info absolute left-0 top-1/2 -translate-y-1/2 ml-4"></i>
                </div>
                <?= isset($_GET['validation'])? '<p class="text-red-500" > Empty fields</p>' :null ?>
            </div>
            <div class="mb-4">
                <label for="" class="text-xl">Product Image</label>
                <div class="relative mt-2">
                    <?php $image = isset($_GET['img_url']) ? $_GET['img_url'] :$product['img_url']?>
                    <img src="<?="../img/".$image?>" class="w-[200px] h-[100px]" alt="">
                    <input 
                    name="product_img"
                    type="file" 
                    class=" px-2 py-2 border border-grey-600 rounded-md w-full pl-9">
                </div>
            </div>
                
            <div class="mb-4 flex justify-end gap-4">
                <button class="bg-red-500 px-6 py-2 rounded-md hover:text-gray-300" type="reset">Clear</button>
                <button class="bg-green-500 px-6 py-2 rounded-md hover:text-gray-300">Update</button>
            </div>
        </form>

    </div>
</main>

