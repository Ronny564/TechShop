<?php
require_once "sidebar.php";
require_once "link.php";
require_once "../database/PDO.php";

// Fetch sales data
$salesQuery = "
    SELECT sale.SaleId, customers.name AS CustomerName, 
           SUM(saledetail.Total_Amount) AS TotalPrice, sale.order_date
    FROM sale
    JOIN customers ON sale.CusId = customers.CusId
    JOIN saledetail ON sale.SaleId = saledetail.saleID
    GROUP BY sale.SaleId, customers.name, sale.order_date
    ORDER BY sale.order_date DESC";
$salesStmt = $pdo->query($salesQuery);
$sales = $salesStmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Sales Table</title>
</head>
<body>
<div class="p-4 sm:ml-64">
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Sales Table</h1>
        <table class="table-auto w-full bg-white shadow-md rounded border border-gray-200">
            <thead>
                <tr class="bg-gray-200 text-left">
                    <th class="px-4 py-2">Sale ID</th>
                    <th class="px-4 py-2">Customer Name</th>
                    <th class="px-4 py-2">Total Price</th>
                    <th class="px-4 py-2">Order Date</th>
                    <th class="px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sales as $sale): ?>
                    <tr class="border-t">
                        <td class="px-4 py-2"><?= $sale['SaleId']?></td>
                        <td class="px-4 py-2"><?= $sale['CustomerName'] ?></td>
                        <td class="px-4 py-2">$<?=$sale['TotalPrice'] ?></td>
                        <td class="px-4 py-2"><?= $sale['order_date'] ?></td>
                        <td class="flex items-center gap-2 px-4 py-2">
                            <!-- Details Button -->
                            <form method="GET" action="saledetail.php">
                                <input type="hidden" name="SaleId" value="<?= $sale['SaleId'] ?>">
                                <button type="submit" class="text-black p-2 rounded bg-blue-600 hover:bg-blue-700">
                                    Details
                                </button>
                            </form>
                            <!-- Delete Button -->
                            <form method="POST" action="delete_sale.php">
                                <input type="hidden" name="SaleId" value="<?= $sale['SaleId'] ?>">
                                <button type="submit" class="text-black p-2 rounded bg-red-600 hover:bg-red-700">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>
</body>
</html>
