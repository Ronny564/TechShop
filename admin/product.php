<?php
require_once "sidebar.php";
require_once "link.php";
require_once "data.php";
require_once "../database/PDO.php";
$allProducts = getProduct($pdo);
 ?>






<div class="p-4 sm:ml-64">
   <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
   <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Product Id
                </th>
                <th scope="col" class="px-6 py-3">
                    Product name
                </th>
                <th scope="col" class="px-6 py-3">
                    Stock
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
                <th scope="col" class="px-6 py-3">
                    Color
                </th>
                <th scope="col" class="px-6 py-3">
                    Category
                </th>
                <th scope="col" class="px-6 py-3">
                    Brand
                </th>
                <th scope="col" class="px-6 py-3">
                    Details
                </th>
                <th scope="col" class="px-6 py-3">
                    Image
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($allProducts as $product) :?>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <?=$product['id'] ?>
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <?=$product['name'] ?>
                </th>
                <td class="px-6 py-4">
                <?=$product['stock'] ?>
                </td>
                <td class="px-6 py-4">
                <?=$product['price'] ?>
                </td>
                <td class="px-6 py-4">
                <?=$product['color'] ?>
                </td>
                <td class="px-6 py-4">
                <?=$product['category'] ?>
                </td>
                <td class="px-6 py-4">
                <?=$product['brand'] ?>
                </td>
                <td class="px-6 py-4">
                <?=$product['details'] ?>
                </td>
                <td class="px-6 py-4">
                <img src="../img/<?=$product['img_url'] ?>" alt="">
                
                </td>
                <td class="flex items-center gap-2 p-3">
                    <a href="productUpdate.php?id=<?=$product['id']?>" class="text-black p-4 rounded-full bg-green-600 hover:bg-green-700"><i class="fa-solid fa-pen"></i></a>
                    <form action="productDelete.php" class="mt-3" method="POST">
                    <input type="hidden" value="<?=$product['id']?>" name="id">
                    <button href="" class="text-black p-4 rounded-full bg-red-600 hover:bg-red-700"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <div class="flex justify-center mt-4">
        <a href="productCreate.php" class="text-black p-4 w-full bg-blue-600 rounded-lg text-center">Create</a>
    </div>
   </div>
</div>


