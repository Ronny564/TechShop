<?php
require_once "link.php";
require_once "data.php";

if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['user']['CusId'])) {
    echo "Error: You must log in to continue.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['cart'])) {
    $payment_method = $_POST['payment_method'];
    $customer_id = $_SESSION['user']['CusId']; 

    try {
        // Begin a transaction
        $pdo->beginTransaction();

        // Insert into the `sale` table
        $stmt = $pdo->prepare("INSERT INTO sale (CusId) VALUES (:CusId)");
        $stmt->execute(['CusId' => $customer_id]);
        $sale_id = $pdo->lastInsertId(); // Get the last inserted SaleId

        // Insert into `saledetail` table and update product stock
        foreach ($_SESSION['cart'] as $cart) {
            $stmt = $pdo->prepare("INSERT INTO saledetail 
                (saleID, CusID, ProductID, Quantity, Total_Amount, Payment_Method) 
                VALUES (:saleID, :CusID, :ProductID, :Quantity, :Total_Amount, :Payment_Method)");
            $stmt->execute([
                'saleID' => $sale_id,
                'CusID' => $customer_id,
                'ProductID' => $cart['id'],
                'Quantity' => $cart['qty'],
                'Total_Amount' => $cart['price'] * $cart['qty'],
                'Payment_Method' => $payment_method,
            ]);

            // Update the product stock
            $updateStockStmt = $pdo->prepare("UPDATE products SET stock = stock - :quantity WHERE id = :product_id");
            $updateStockStmt->execute([
                'quantity' => $cart['qty'],
                'product_id' => $cart['id']
            ]);

            // Ensure stock does not go below zero
            if ($updateStockStmt->rowCount() === 0) {
                throw new Exception("Failed to update stock. Product ID: {$cart['id']} may have insufficient stock.");
            }
        }

        // Commit the transaction
        $pdo->commit();

        // Clear the cart session
        unset($_SESSION['cart']);

        echo "<script>
            alert('Order placed successfully!');
            window.location.href = 'product.php';
        </script>";
    } catch (Exception $e) {
        // Roll back the transaction on failure
        $pdo->rollBack();
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "<script>
        alert('Cart is empty or invalid request!');
        window.location.href = 'cart.php';
    </script>";
}
?>
