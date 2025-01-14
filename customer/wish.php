<?php
require_once "navbar.php";
if (!isset($_SESSION)) {
    session_start();
}
require_once "../database/PDO.php";

if (!isset($_SESSION['user'])) {
    echo "You must be logged in to view your wishlist.";
    exit;
}

$userId = $_SESSION['user']['CusId']; // User ID from session

// Query to get all products in the user's wishlist
$stmt = $pdo->prepare("SELECT products.* FROM wishlist 
                        INNER JOIN products ON wishlist.ProductID = products.id 
                        WHERE wishlist.CusId = :CusId");
$stmt->execute([':CusId' => $userId]);
$wishlistProducts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Wishlist</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto py-16 px-6">
        <h1 class="text-4xl font-bold text-center text-gray-800 mb-12">Your Wishlist</h1>

        <?php if (empty($wishlistProducts)): ?>
            <div class="bg-white p-8 rounded-xl shadow-lg text-center">
                <h2 class="text-2xl font-semibold text-gray-700 mb-4">Your wishlist is empty!</h2>
                <p class="text-gray-600 mb-6">Browse our collection and add your favorites to the wishlist.</p>
                <a href="product.php" class="bg-gradient-to-r from-blue-500 to-teal-500 text-white px-8 py-3 rounded-lg shadow-md hover:bg-gradient-to-l transition-all">Browse Products</a>
            </div>
        <?php else: ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-10">
                <?php foreach ($wishlistProducts as $product): ?>
                    <div class="bg-white p-6 rounded-xl shadow-lg transform hover:scale-105 transition-all">
                        <img src="../img/<?= $product['img_url'] ?>" alt="<?= $product['name'] ?>" class="w-full h-64 object-cover rounded-xl mb-6" />
                        <h3 class="text-2xl font-semibold text-gray-800 mb-2"><?= $product['name'] ?></h3>
                        <p class="text-gray-700 text-lg">Color: <span class="font-medium text-black"><?= $product['color'] ?></span></p>
                        <p class="text-lg text-gray-800 mt-2">Price: <span class="text-xl font-bold text-black">$<?= number_format($product['price'], 2) ?></span></p>
                        <div class="flex justify-between items-center mt-6">
                            <!-- Add to Cart Button -->
                            <form action="addtocart.php" method="POST">
                                <input type="hidden" name="id" value="<?= $product['id'] ?>">
                                <button type="submit" class="bg-gradient-to-r from-green-500 to-teal-500 text-white px-6 py-2 rounded-md hover:bg-gradient-to-l transition-all">Add to Cart</button>
                            </form>
                            
                            <!-- Remove from Wishlist Button -->
                            <form action="removefromwish.php" method="POST">
                                <input type="hidden" name="id" value="<?= $product['id'] ?>">
                                <button type="submit" class="bg-red-500 text-white px-6 py-2 rounded-md hover:bg-red-600 transition-colors">Remove</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

</body>
</html>
