<?php
require_once "sidebar.php";
require_once "link.php";
require_once "../database/PDO.php";

// Fetch search query
$searchQuery = isset($_GET['search']) ? trim($_GET['search']) : '';

// Fetch sales data
$salesQuery = "
    SELECT sale.SaleId, customers.name AS CustomerName, 
           SUM(saledetail.Total_Amount) AS TotalPrice, sale.order_date
    FROM sale
    JOIN customers ON sale.CusId = customers.CusId
    JOIN saledetail ON sale.SaleId = saledetail.saleID
    WHERE customers.name LIKE :searchQuery
    GROUP BY sale.SaleId, customers.name, sale.order_date
    ORDER BY sale.order_date DESC";

$salesStmt = $pdo->prepare($salesQuery);
$salesStmt->execute(['searchQuery' => "%$searchQuery%"]);
$sales = $salesStmt->fetchAll(PDO::FETCH_ASSOC);
?>

<style>
    body {
        background-color: #1E1E2F;
    }
</style>

<body>
<div class="p-4 sm:ml-64">
    <h1 class="text-2xl font-bold mb-6 text-white">Sales Table</h1>
    <form class="max-w-md mx-auto mb-4" method="GET">
        <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search by Customer Name</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="search" name="search" id="search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search by Customer Name" value="<?= htmlspecialchars($searchQuery) ?>" required />
            <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
        </div>
    </form>

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">Sale ID</th>
                <th scope="col" class="px-6 py-3">Customer Name</th>
                <th scope="col" class="px-6 py-3">Total Price</th>
                <th scope="col" class="px-6 py-3">Order Date</th>
                <th scope="col" class="px-6 py-3">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sales as $sale): ?>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?= $sale['SaleId'] ?>
                    </td>
                    <td class="px-6 py-4">
                        <?= $sale['CustomerName'] ?>
                    </td>
                    <td class="px-6 py-4">
                        $<?= number_format($sale['TotalPrice'], 2) ?>
                    </td>
                    <td class="px-6 py-4">
                        <?= $sale['order_date'] ?>
                    </td>
                    <td class="flex items-center gap-2 px-6 py-4">
                        <!-- Details Button -->
                        <form method="GET" action="saledetail.php">
                            <input type="hidden" name="SaleId" value="<?= $sale['SaleId'] ?>">
                            <button type="submit" class="text-white p-2 rounded-full bg-blue-600 hover:bg-blue-700">
                                Details
                            </button>
                        </form>
                        <!-- Delete Button -->
                        <form method="POST" action="delete_sale.php">
                            <input type="hidden" name="SaleId" value="<?= $sale['SaleId'] ?>">
                            <button type="submit" class="text-white p-2 rounded-full bg-red-600 hover:bg-red-700">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
