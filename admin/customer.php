<?php
require_once "sidebar.php";
require_once "link.php";
require_once "data.php";
require_once "../database/PDO.php";

// Fetch all customers
$allCustomers = getCustomer($pdo);

// Check if there's a search query
$searchQuery = isset($_GET['search']) ? trim($_GET['search']) : '';

// Filter customers based on the search query (name or email)
if (!empty($searchQuery)) {
    $allCustomers = array_filter($allCustomers, function($customer) use ($searchQuery) {
        return stripos($customer['name'], $searchQuery) !== false || 
               stripos($customer['email'], $searchQuery) !== false;
    });
}

// Pagination setup
$itemsPerPage = 10; // Number of items per page
$totalCustomers = count($allCustomers); // Total number of customers
$totalPages = ceil($totalCustomers / $itemsPerPage); // Total pages
$currentPage = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$currentPage = max(1, min($totalPages, $currentPage)); // Ensure page is within range
$offset = ($currentPage - 1) * $itemsPerPage;

// Slice the array to get the current page's items
$paginatedCustomers = array_slice($allCustomers, $offset, $itemsPerPage);
?>

<style>
    body {
        background-color: #1E1E2F;
    }
</style>

<body>
<div class="p-4 sm:ml-64">
<h1 class="text-2xl font-bold mb-6 text-white">Customers Tables</h1>
    <form class="max-w-md mx-auto" method="GET">
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <input type="search" id="default-search" name="search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" value="<?= htmlspecialchars($searchQuery) ?>" required />
            <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
        </div>
    </form>

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">Customer Id</th>
                <th scope="col" class="px-6 py-3">Customer Name</th>
                <th scope="col" class="px-6 py-3">Email</th>
                <th scope="col" class="px-6 py-3">Address</th>
                <th scope="col" class="px-6 py-3">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($paginatedCustomers as $customer): ?>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?= $customer['CusId'] ?>
                    </th>
                    <td class="px-6 py-4"><?= $customer['name'] ?></td>
                    <td class="px-6 py-4"><?= $customer['email'] ?></td>
                    <td class="px-6 py-4"><?= $customer['address'] ?></td>
                    <td class="flex items-center gap-2 p-3">
                        <a href="customerupdate.php?id=<?= $customer['CusId'] ?>" class="text-black p-4 rounded-full bg-green-600 hover:bg-green-700"><i class="fa-solid fa-pen"></i></a>
                        <form action="customerdelete.php" method="POST" class="mt-3">
                            <input type="hidden" value="<?= $customer['CusId'] ?>" name="id">
                            <button class="text-black p-4 rounded-full bg-red-600 hover:bg-red-700"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

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
