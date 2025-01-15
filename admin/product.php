<?php
require_once "sidebar.php";
require_once "link.php";
require_once "data.php";
require_once "../database/PDO.php";

// Fetch all products
$allProducts = getProduct($pdo);

// Check if there's a search query
$searchQuery = isset($_GET['search']) ? trim($_GET['search']) : '';

// Filter products based on the search query (product name)
if (!empty($searchQuery)) {
    $allProducts = array_filter($allProducts, function ($product) use ($searchQuery) {
        return stripos($product['name'], $searchQuery) !== false;
    });
}

// Pagination setup
$itemsPerPage = 10; // Number of items per page
$totalProducts = count($allProducts); // Total number of products
$totalPages = ceil($totalProducts / $itemsPerPage); // Total pages
$currentPage = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$currentPage = max(1, min($totalPages, $currentPage)); // Ensure page is within range
$offset = ($currentPage - 1) * $itemsPerPage;

// Slice the array to get the current page's items
$paginatedProducts = array_slice($allProducts, $offset, $itemsPerPage);
?>

<style>
    body {
        background-color: #1E1E2F;
    }
</style>

<body>
<div class="p-4 sm:ml-64">
    <form class="max-w-md mx-auto" method="GET">
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <input type="search" name="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" value="<?= htmlspecialchars($searchQuery) ?>" required />
            <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
        </div>
    </form>

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">Product Id</th>
                <th scope="col" class="px-6 py-3">Product Name</th>
                <th scope="col" class="px-6 py-3">Stock</th>
                <th scope="col" class="px-6 py-3">Price</th>
                <th scope="col" class="px-6 py-3">Color</th>
                <th scope="col" class="px-6 py-3">Category</th>
                <th scope="col" class="px-6 py-3">Brand</th>
                <th scope="col" class="px-6 py-3">Details</th>
                <th scope="col" class="px-6 py-3">Image</th>
                <th scope="col" class="px-6 py-3">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($paginatedProducts as $product) : ?>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $product['id'] ?></td>
                    <td class="px-6 py-4"><?= $product['name'] ?></td>
                    <td class="px-6 py-4"><?= $product['stock'] ?></td>
                    <td class="px-6 py-4"><?= $product['price'] ?></td>
                    <td class="px-6 py-4"><?= $product['color'] ?></td>
                    <td class="px-6 py-4"><?= $product['category'] ?></td>
                    <td class="px-6 py-4"><?= $product['brand'] ?></td>
                    <td class="px-6 py-4"><?= $product['details'] ?></td>
                    <td class="px-6 py-4"><img src="../img/<?= $product['img_url'] ?>" alt="" class="rounded-lg"></td>
                    <td class="flex items-center gap-2 p-3 my-auto">
                        <a href="productUpdate.php?id=<?= $product['id'] ?>" class="text-black p-4 rounded-full bg-green-600 hover:bg-green-700"><i class="fa-solid fa-pen"></i></a>
                        <form action="productDelete.php" class="mt-3" method="POST">
                            <input type="hidden" value="<?= $product['id'] ?>" name="id">
                            <button class="text-black p-4 rounded-full bg-red-600 hover:bg-red-700"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="flex justify-center mt-4">
        <a href="productCreate.php" class="text-black p-4 w-full bg-blue-600 rounded-lg text-center">Create</a>
    </div>

    <!-- Pagination Links -->
    <div class="flex justify-center mt-4">
        <?php if ($currentPage > 1): ?>
            <a href="?page=<?= $currentPage - 1 ?>&search=<?= urlencode($searchQuery) ?>" class="px-4 py-2 bg-gray-700 text-white rounded-lg mx-1">Previous</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="?page=<?= $i ?>&search=<?= urlencode($searchQuery) ?>" class="px-4 py-2 <?= $i === $currentPage ? 'bg-blue-700' : 'bg-gray-700' ?> text-white rounded-lg mx-1"><?= $i ?></a>
        <?php endfor; ?>

        <?php if ($currentPage < $totalPages): ?>
            <a href="?page=<?= $currentPage + 1 ?>&search=<?= urlencode($searchQuery) ?>" class="px-4 py-2 bg-gray-700 text-white rounded-lg mx-1">Next</a>
        <?php endif; ?>
    </div>

    
</div>
</body>
