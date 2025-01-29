<?php
require_once "navbar.php";
require_once "../database/PDO.php";

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$CusId = $_SESSION['user']['CusId'];

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

function getUserData($pdo, $userId) {
    $query = "SELECT * FROM customers WHERE CusId = :userId";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['userId' => $userId]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function updateUserData($pdo, $userId, $name, $email, $address, $password = null) {
    if ($password) {
        $query = "UPDATE customers SET name = :name, email = :email, address = :address, password = :password WHERE CusId = :userId";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            'name' => $name,
            'email' => $email,
            'address' => $address,
            'password' =>$password,
            'userId' => $userId
        ]);
    } else {
        $query = "UPDATE customers SET name = :name, email = :email, address = :address WHERE CusId = :userId";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            'name' => $name,
            'email' => $email,
            'address' => $address,
            'userId' => $userId
        ]);
    }
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['userId'])) {
    $userId = $_POST['userId'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $password = $_POST['password'];

    updateUserData($pdo, $userId, $name, $email, $address, $password);
    echo "<script>alert('Profile updated successfully!');</script>";
    // Refresh user data in session
    $_SESSION['user'] = getUserData($pdo, $userId);
}

// Fetch user data
$userData = getUserData($pdo, $CusId);
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
    <div class="container mx-auto py-8 px-4 mt-1">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Profile Details</h1>
        
        <!-- Profile Form -->
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-2xl mx-auto">
            <h2 class="text-2xl font-semibold text-gray-700 mb-4">Edit Your Profile</h2>
            <form method="POST" class="space-y-6">
                <input type="hidden" name="userId" value="<?php echo $userData['CusId']; ?>">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" value="<?php echo htmlspecialchars($userData['name']); ?>" 
                        class="mt-2 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm text-gray-700 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" value="<?php echo htmlspecialchars($userData['email']); ?>" 
                        class="mt-2 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm text-gray-700 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Address</label>
                    <textarea name="address" rows="3" 
                        class="mt-2 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm text-gray-700 focus:ring-indigo-500 focus:border-indigo-500"><?= htmlspecialchars($userData['address']) ?></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">New Password <span class="text-gray-500">(optional)</span></label>
                    <input type="password" name="password" 
                        class="mt-2 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm text-gray-700 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <button type="submit" 
                        class="w-full bg-indigo-600 text-white py-3 px-6 rounded-lg font-medium shadow hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>

        <!-- Recent Purchases -->
        <h2 class="text-2xl font-bold text-gray-800 mt-12 mb-6">Recent Purchases</h2>
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
                                <td class="px-6 py-4 whitespace-nowrap text-gray-700"><?= $purchase['order_date'] ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-700"><?= $purchase['product_name'] ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-700"><?= $purchase['Quantity'] ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-700">$<?= $purchase['Total_Amount'] ?></td>
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
<?php
require_once "footer.php";
?>