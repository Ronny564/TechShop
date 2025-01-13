<?php
require_once "sidebar.php";
require_once "link.php";
require_once "../database/PDO.php";

// Fetch Sale ID from GET parameters
if (isset($_GET['SaleId'])) {
    $saleId = $_GET['SaleId'];

    // Fetch sale details
    $detailsQuery = "
        SELECT saledetail.SaleDetail_ID, products.name AS ProductName, customers.name AS CustomerName,
               saledetail.Quantity, saledetail.Total_Amount, saledetail.Payment_Method
        FROM saledetail
        JOIN products ON saledetail.ProductID = products.id
        JOIN customers ON saledetail.CusID = customers.CusId
        WHERE saledetail.saleID = :saleId
    ";
    $detailsStmt = $pdo->prepare($detailsQuery);
    $detailsStmt->execute([':saleId' => $saleId]);
    $details = $detailsStmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    die("Invalid Sale ID.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sale Details</title>
</head>
<body>
<div class="p-4 sm:ml-64">
<div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Sale Details</h1>
        <table class="table-auto w-full bg-white shadow-md rounded border border-gray-200">
            <thead>
                <tr class="bg-gray-200 text-left">
                    <th class="px-4 py-2">Sale Detail ID</th>
                    <th class="px-4 py-2">Product Name</th>
                    <th class="px-4 py-2">Customer Name</th>
                    <th class="px-4 py-2">Quantity</th>
                    <th class="px-4 py-2">Total Price</th>
                    <th class="px-4 py-2">Payment Method</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($details)): ?>
                    <?php foreach ($details as $detail): ?>
                        <tr class="border-t">
                            <td class="px-4 py-2"><?= $detail['SaleDetail_ID'] ?></td>
                            <td class="px-4 py-2"><?= $detail['ProductName'] ?></td>
                            <td class="px-4 py-2"><?= $detail['CustomerName'] ?></td>
                            <td class="px-4 py-2"><?= $detail['Quantity'] ?></td>
                            <td class="px-4 py-2">$<?= $detail['Total_Amount'] ?></td>
                            <td class="px-4 py-2"><?= $detail['Payment_Method'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center py-4">No details found for this sale.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="mt-6">
            <a href="sale.php" class="text-white p-2 rounded bg-blue-600 hover:bg-blue-700">Back to Sales</a>
        </div>
    </div>
</div>
</div>
</body>
</html>
