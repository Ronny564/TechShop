<?php
require_once "../database/PDO.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get SaleId from the form submission
    $saleId = isset($_POST['SaleId']) ? (int)$_POST['SaleId'] : 0;

    if ($saleId > 0) {
        try {
            // Begin transaction
            $pdo->beginTransaction();

            // Delete from saledetail table
            $deleteSaleDetailQuery = "DELETE FROM saledetail WHERE saleID = :saleId";
            $stmt = $pdo->prepare($deleteSaleDetailQuery);
            $stmt->execute(['saleId' => $saleId]);

            // Delete from sale table
            $deleteSaleQuery = "DELETE FROM sale WHERE SaleId = :saleId";
            $stmt = $pdo->prepare($deleteSaleQuery);
            $stmt->execute(['saleId' => $saleId]);

            // Commit transaction
            $pdo->commit();

            // Redirect back to sales page with success message
            header("Location: sale.php?status=success&message=Sale+deleted+successfully");
            exit;
        } catch (PDOException $e) {
            // Rollback transaction in case of error
            $pdo->rollBack();

            // Redirect back with error message
            header("Location: sale.php?status=error&message=" . urlencode($e->getMessage()));
            exit;
        }
    } else {
        // Redirect back if SaleId is invalid
        header("Location: sale.php?status=error&message=Invalid+SaleId");
        exit;
    }
} else {
    // Redirect back if accessed without POST method
    header("Location: sale.php?status=error&message=Invalid+request");
    exit;
}
