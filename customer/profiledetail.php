<?php
require_once "link.php";
require_once "navbar.php";
require_once "../database/PDO.php";

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['user'])) {
    echo "<script>alert('Please log in to view your profile.');</script>";
    // header("Location: login.php");
    exit(); // Make sure to call exit after header() to stop further execution
}

$user = $_SESSION['user'];
$userId = $user['CusId'];
$error = "";

// Fetch user details from the database
function getUserDetails($pdo, $userId)
{
    $stmt = $pdo->prepare("SELECT name, email, password FROM customers WHERE CusId = :CusId");
    $stmt->execute(['CusId' => $userId]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Fetch recent purchases
function getRecentPurchases($pdo, $userId)
{
    $stmt = $pdo->prepare("
        SELECT s.order_date, p.name AS product_name, sd.Quantity, sd.Total_Amount 
        FROM saledetail sd
        JOIN sale s ON sd.saleID = s.SaleId
        JOIN products p ON sd.ProductID = p.id
        WHERE sd.CusID = :CusId
        ORDER BY s.order_date DESC
    ");
    $stmt->execute(['CusId' => $userId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Handle form submission to update user details
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Update user details
    $stmt = $pdo->prepare("
        UPDATE customers 
        SET name = :name, email = :email, password = :password 
        WHERE CusId = :CusId
    ");
    try {
        $stmt->execute([
            'name' => $name,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'CusId' => $userId,
        ]);

        // Update session details
        $_SESSION['user'] = [
            'CusId' => $userId,
            'name' => $name,
            'email' => $email,
        ];

        echo "<script>alert('Profile updated successfully!');</script>";
        header("Location: profiledetail.php");
        exit();
    } catch (PDOException $e) {
        $error = "Error updating profile: " . $e->getMessage();
    }
}

// Fetch user details and purchases
$userDetails = getUserDetails($pdo, $userId);
$recentPurchases = getRecentPurchases($pdo, $userId);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Details</title>
    <link rel="stylesheet" href="./css/profile.css"> 
</head>
<body>
<div class="container">
    <h1>Profile Details</h1>

    <!-- User Details Section -->
    <form method="POST" class="profile-form">
        <h2>Update Profile</h2>
        <?php if ($error): ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?= $userDetails['name']?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?= $userDetails['email']?>" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter new password" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

    <!-- Recent Purchases Section -->
    <h2>Recent Purchases</h2>
    <?php if ($recentPurchases): ?>
        <table class="purchases-table">
            <thead>
                <tr>
                    <th>Order Date</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Total Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($recentPurchases as $purchase): ?>
                    <tr>
                        <td><?= $purchase['order_date'] ?></td>
                        <td><?= htmlspecialchars($purchase['product_name']) ?></td>
                        <td><?= $purchase['Quantity'] ?></td>
                        <td>$<?= number_format($purchase['Total_Amount'], 2) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No recent purchases found.</p>
    <?php endif; ?>
</div>
</body>
</html>
