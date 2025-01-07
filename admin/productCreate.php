<?php
require_once "sidebar.php";
require_once "link.php";
?>

<div class="min-h-screen px-1 pt-1.5">
    <div class="flex flex-col md:flex-row">
    <!--input form-->
    <main class="mt-40 md:mt-0 md:ml-64 p-4 w-full flex items-center justify-center">
        <!-- container-->
        <div class="container bg-gray-100 rounded-lg px-10 py-4">
            <?php if(isset($_GET['status']) && $_GET['status']=='success'){ ?>
            <p class="text-green-300">Product create successful</p>
            <?php }?>
            <p class="text-3xl mb-3 font-bold">Product Create Form</p>
            <form action="ProductCreateAction.php" method="POST" enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="" class="text-xl">Product ID</label>
                    <div class="relative mt-2">
                        <input 
                        name="product_id" 
                        type="text" 
                        placeholder="Enter Product Name" class=" px-2 py-2 border border-grey-600 rounded-md w-full pl-9">
                        <i class="fa-brands fa-product-hunt absolute left-0 top-1/2 -translate-y-1/2 ml-4"></i>
                     </div>
                     <?= isset($_GET['validation'])? '<p class="text-red-500" > Empty fields</p>' :null ?>
                </div>
                <div class="mb-4">
                    <label for="" class="text-xl">Product Name </label>
                    <div class="relative mt-2">
                        <input 
                        name="product_name"
                        type="text" 
                        placeholder="Enter Product Name" class=" px-2 py-2 border border-grey-600 rounded-md w-full pl-9">
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
                        placeholder="Enter Product Color" 
                        class="px-2 py-2 border border-grey-600 rounded-md w-full pl-9">
                        <i class="fa-solid fa-layer-group absolute left-0 top-1/2 -translate-y-1/2 ml-4"></i>
                    </div>
                    <?= isset($_GET['validation'])? '<p class="text-red-500" > Empty fields</p>' :null ?>
                </div>
                <div class="mb-4">
                    <label for="" class="text-xl">Product Category </label>
                    <div class="relative mt-2">
                        <input name="product_category"
                        type="text" 
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
                        placeholder="Enter Product Brand" 
                        class="px-2 py-2 border border-grey-600 rounded-md w-full pl-9">
                        <i class="fa-solid fa-layer-group absolute left-0 top-1/2 -translate-y-1/2 ml-4"></i>
                    </div>
                    <?= isset($_GET['validation'])? '<p class="text-red-500" > Empty fields</p>' :null ?>
                </div>
                <div class="mb-4">
                    <label for="" class="text-xl">Product Image</label>
                    <div class="relative mt-2">
                        <?php $image = isset($_GET['img_url']) ? $_GET['img_url'] :null?>
                        <img src="<?="../img/".$image?>" class="w-[200px] h-[100px]" alt="">
                        <input 
                        name="product_img"
                        type="file" 
                        class=" px-2 py-2 border border-grey-600 rounded-md w-full pl-9">
                        <i class="fa-solid fa-dollar-sign absolute left-0 top-1/2 -translate-y-1/2 ml-4"></i>
                    </div>
                </div>
                
                <div class="mb-4 flex justify-end gap-4">
                    <button class="bg-red-500 px-6 py-2 rounded-md hover:text-gray-300" type="reset">Clear</button>
                    <button class="bg-green-500 px-6 py-2 rounded-md hover:text-gray-300">Create</button>
                </div>
            </form>

        </div>
    </main>
    
</div>