<?php
require_once "../database/PDO.php"; // Ensure the connection to the database is included
session_start();

if (!isset($_SESSION['user'])) {
    echo "You must be logged in to perform this action.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the product ID from the form submission
    $productId = $_POST['id'];
    $userId = $_SESSION['user']['CusId']; // User ID from session

    // Prepare the SQL query to delete the product from the wishlist
    $stmt = $pdo->prepare("DELETE FROM wishlist WHERE CusId = :CusId AND ProductID = :ProductID");
    $stmt->execute([
        ':CusId' => $userId,
        ':ProductID' => $productId
    ]);

    // Redirect back to the wishlist page
    header("Location: wish.php");
    exit;
}
