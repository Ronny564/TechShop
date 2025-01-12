<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once "navbar.php";
require_once "link.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wishlist</title>
</head>
<body class="bg-gray-100">
    <div class="max-w-7xl mx-auto p-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Your Wishlist</h1>
        <?php if (isset($_SESSION['wish']) && !empty($_SESSION['wish'])): ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ($_SESSION['wish'] as $item): ?>
                    <div class="bg-white shadow-md rounded-lg p-4 flex flex-col">
                        <div class="mb-4">
                            <img src="../img/<?= $item['img_url'] ?>" alt="<?= $item['name'] ?>" class="h-40 w-full object-contain rounded-md">
                        </div>
                        <div class="flex-grow">
                            <h2 class="text-xl font-bold text-gray-800"><?= $item['name'] ?></h2>
                            <p class="text-gray-600 mt-2"><?= $item['details'] ?></p>
                            <p class="text-gray-800 mt-2 font-bold">Color: <?= $item['color'] ?></p>
                            <p class="text-gray-800 mt-2 font-bold">Price: $<?= $item['price'] ?></p>
                        </div>
                        <div class="mt-4 flex justify-between">
                            <form action="addtocart.php" method="POST">
                                <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                <button type="submit" class="text-sm px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                                    Add to Cart
                                </button>
                            </form>
                            <form action="removefromwish.php" method="POST">
                                <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                <button type="submit" class="text-sm px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                                    Remove
                                </button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="bg-white shadow-md rounded-lg p-6 text-center">
                <h2 class="text-xl font-bold text-gray-800">Your Wishlist is Empty</h2>
                <p class="text-gray-600 mt-4">Start adding items to your wishlist by clicking the heart icon on the product page.</p>
                <a href="product.php" class="mt-6 inline-block text-sm px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                    Browse Products
                </a>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
