<?php
session_start();
require_once "../database/PDO.php";

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$user = $_SESSION['user'];
$CusId = $user['CusId'];

// Fetch recent purchases
$stmt = $pdo->prepare("
    SELECT s.SaleId, s.order_date, p.name AS product_name, sd.Quantity, sd.Total_Amount 
    FROM saledetail sd
    JOIN sale s ON sd.saleID = s.SaleId
    JOIN products p ON sd.ProductID = p.id
    WHERE sd.CusID = :CusId
    ORDER BY s.order_date DESC
");
$stmt->execute(['CusId' => $CusId]);
$purchases = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $password = !empty($_POST['password']) ? $_POST['password'] : $user['password']; // Store password in plain text

    $stmt = $pdo->prepare("
        UPDATE customers 
        SET name = :name, email = :email, address = :address, password = :password 
        WHERE CusId = :CusId
    ");
    $stmt->execute([
        'name' => $name,
        'email' => $email,
        'address' => $address,
        'password' => $password, // Plain text password
        'CusId' => $CusId
    ]);

    // Update session with new user details
    $_SESSION['user'] = [
        'CusId' => $CusId,
        'name' => $name,
        'email' => $email,
        'address' => $address,
        'password' => $password // Plain text password
    ];

    echo "<script>alert('Profile updated successfully!');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Details</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Profile Details</h1>
        
        <div class="bg-white p-6 rounded-lg shadow-md">
            <form method="POST" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Address</label>
                    <input type="text" name="address" value="<?php echo htmlspecialchars($user['address']); ?>" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">New Password (leave blank to keep current)</label>
                    <input type="password" name="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Update Profile</button>
                </div>
            </form>
        </div>
        <h2 class="text-2xl font-bold mt-8 mb-4">Recent Purchases</h2>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <?php if (count($purchases) > 0): ?>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Amount</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php foreach ($purchases as $purchase): ?>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap"><?php echo htmlspecialchars($purchase['order_date']); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap"><?php echo htmlspecialchars($purchase['product_name']); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap"><?php echo htmlspecialchars($purchase['Quantity']); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap">$<?php echo htmlspecialchars($purchase['Total_Amount']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="text-gray-600">No recent purchases found.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>