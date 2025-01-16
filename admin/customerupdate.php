<?php
require_once "sidebar.php";
require_once "../database/PDO.php";
require_once "link.php";
require_once "data.php";

$id= $_GET['id'];
$customer = getCustomersbyID($pdo, $id);
?>
<main class="mt-40 md:mt-0 md:ml-64 p-4 w--80 flex items-center justify-center">
    <!-- container-->
    <div class="container bg-gray-100 rounded-lg px-10 py-4">
        <?php if(isset($_GET['status']) && $_GET['status']=='success'){ ?>
        <p class="text-green-300">Customer Update successful</p>
        <?php }?>
        <p class="text-3xl mb-3 font-bold">Cutomer Update Form</p>
        <form action="customerupdateAction.php" method="POST">
            <input type="hidden" name="id" value="<?=$id?>">
            <div class="mb-4">
                <label for="" class="text-xl">Customer Name </label>
                <div class="relative mt-2">
                    <input
                    name="name"
                    type="text" 
                    value="<?=$customer['name']?>" 
                    placeholder="Enter Product Name" 
                    class="px-2 py-2 border border-grey-600 rounded-md w-full pl-9">
                    <i class="fa-solid fa-user absolute left-0 top-1/2 -translate-y-1/2 ml-4"></i>
                </div>
                <?= isset($_GET['validation'])? '<p class="text-red-500" > Empty fields</p>' :null ?>
            </div>
            <div class="mb-4">
                <label for="" class="text-xl">Customer Email </label>
                <div class="relative mt-2">
                    <input name="email"
                    type="text" 
                    value="<?= $customer['email']?>" 
                    placeholder="Enter Product Color" 
                    class="px-2 py-2 border border-grey-600 rounded-md w-full pl-9">
                    <i class="fa-solid fa-envelope absolute left-0 top-1/2 -translate-y-1/2 ml-4"></i>
                </div>
                <?= isset($_GET['validation'])? '<p class="text-red-500" > Empty fields</p>' :null ?>
            </div>
            <div class="mb-4">
                <label for="" class="text-xl">Customer Address </label>
                <div class="relative mt-2">
                    <input name="address"
                    type="text" 
                    value="<?= $customer['address']?>" 
                    placeholder="Enter Product Color" 
                    class="px-2 py-2 border border-grey-600 rounded-md w-full pl-9">
                    <i class="fa-solid fa-location-dot absolute left-0 top-1/2 -translate-y-1/2 ml-4"></i>
                </div>
                <?= isset($_GET['validation'])? '<p class="text-red-500" > Empty fields</p>' :null ?>
            </div>
                
            <div class="mb-4 flex justify-end gap-4">
                <button class="bg-red-500 px-6 py-2 rounded-md hover:text-gray-300" type="reset">Clear</button>
                <button class="bg-green-500 px-6 py-2 rounded-md hover:text-gray-300">Update</button>
            </div>
        </form>

    </div>
</main>
