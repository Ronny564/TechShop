<?php
require_once "../database/PDO.php";
require_once "navbar.php";
require_once "link.php";

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$userId = $_SESSION['user']['CusId'];
$error = "";
$success = "";

// Fetch user details
$query = "SELECT * FROM customers WHERE CusId = :id";
$stmt = $pdo->prepare($query);
$stmt->execute(['id' => $userId]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update'])) {
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        if (!empty($name) && !empty($email) && !empty($password)) {
            $hashedPassword = $password;
            $updateQuery = "UPDATE customers SET name = :name, email = :email, password = :password WHERE CusId = :id";
            $stmt = $pdo->prepare($updateQuery);
            $stmt->execute([
                'name' => $name,
                'email' => $email,
                'password' => $hashedPassword,
                'id' => $userId
            ]);

            $_SESSION['user']['name'] = $name;
            $success = "Profile updated successfully!";
        } else {
            $error = "All fields are required!";
        }
    }
}

// Fetch purchase history with product names
$historyQuery = "SELECT sale.SaleId, sale.order_date, products.name AS ProductName, saledetail.Quantity, saledetail.Total_Amount 
                 FROM sale
                 JOIN saledetail ON sale.SaleId = saledetail.saleID
                 JOIN products ON saledetail.ProductID = products.id
                 WHERE sale.CusId = :id";
$historyStmt = $pdo->prepare($historyQuery);
$historyStmt->execute(['id' => $userId]);
$purchaseHistory = $historyStmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Details</title>
</head>
<body class="bg-gray-100 text-gray-800">

<div class="max-w-4xl mx-auto mt-10 p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-bold mb-6 text-black">Profile Details</h2>

    <?php if ($error): ?>
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4"><?= $error ?></div>
    <?php endif; ?>

    <?php if ($success): ?>
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4"><?= $success ?></div>
    <?php endif; ?>

    <form method="POST" class="space-y-4">
        <div>
            <label for="name" class="block text-sm font-medium">Name</label>
            <input type="text" id="name" name="name" value="<?= $user['name'] ?>" 
                   class="w-full mt-1 p-2 border border-gray-300 rounded text-black" required>
        </div>

        <div>
            <label for="email" class="block text-sm font-medium">Email</label>
            <input type="email" id="email" name="email" value="<?= $user['email'] ?>" 
                   class="w-full mt-1 p-2 border border-gray-300 rounded text-black" required>
        </div>

        <div>
            <label for="password" class="block text-sm font-medium">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter new password" 
                   class="w-full mt-1 p-2 border border-gray-300 rounded text-black" required>
        </div>

        <button type="submit" name="update" 
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 text-black">
            Update Profile
        </button>
    </form>

    <h2 class="text-2xl font-bold mt-10 mb-6 text-black">Purchase History</h2>
    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-300 bg-white rounded-lg shadow-md">
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="text-left p-4 text-black">Order ID</th>
                    <th class="text-left p-4 text-black">Order Date</th>
                    <th class="text-left p-4 text-black">Product Name</th>
                    <th class="text-left p-4 text-black">Quantity</th>
                    <th class="text-left p-4 text-black">Total Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($purchaseHistory) > 0): ?>
                    <?php foreach ($purchaseHistory as $history): ?>
                        <tr class="border-b">
                            <td class="p-4 text-black"><?= $history['SaleId'] ?></td>
                            <td class="p-4 text-black"><?= $history['order_date'] ?></td>
                            <td class="p-4 text-black"><?= $history['ProductName'] ?></td>
                            <td class="p-4 text-black"><?= $history['Quantity'] ?></td>
                            <td class="p-4 text-black">$<?= $history['Total_Amount'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center p-4 text-gray-500">No purchase history found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
