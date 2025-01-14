<?php
if(!isset($_SESSION)){
    session_start();
}
require_once "../database/PDO.php";

if (isset($_SESSION['user'])) {
    $userId = $_SESSION['user']['CusId']; // Assuming you store the user's CusId in session
    $productId = $_POST['id']; // Product ID from the form

    try {
        // Check if the product is already in the user's wishlist
        $stmt = $pdo->prepare("SELECT * FROM wishlist WHERE CusId = :CusId AND ProductID = :ProductID");
        $stmt->execute([':CusId' => $userId, ':ProductID' => $productId]);

        if ($stmt->rowCount() == 0) {
            // Add product to wishlist
            $stmt = $pdo->prepare("INSERT INTO wishlist (CusId, ProductID) VALUES (:CusId, :ProductID)");
            $stmt->execute([':CusId' => $userId, ':ProductID' => $productId]);
            echo "Product added to wishlist!";
            header("Location: product.php");
        } else {
            echo "Product is already in your wishlist!";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
} else {
    echo "You need to be logged in to add products to your wishlist.";
}



?>