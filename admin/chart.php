<?php
require_once "../database/PDO.php";

function getMostSoldProducts($pdo) {
    $query = "SELECT p.name, SUM(sd.Quantity) AS total_sold
              FROM products p
              JOIN saledetail sd ON p.id = sd.ProductID
              GROUP BY p.id
              ORDER BY total_sold DESC
              LIMIT 10";
    $stmt = $pdo->query($query);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getTopLoyalCustomers($pdo) {
    $query = "SELECT c.name, COUNT(s.SaleId) AS total_purchases
              FROM customers c
              JOIN sale s ON c.CusId = s.CusId
              GROUP BY c.CusId
              ORDER BY total_purchases DESC
              LIMIT 10";
    $stmt = $pdo->query($query);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getDailySales($pdo) {
    $query = "SELECT DATE(order_date) AS date, SUM(sd.Total_Amount) AS total_sales
              FROM sale s
              JOIN saledetail sd ON s.SaleId = sd.saleID
              GROUP BY DATE(order_date)";
    $stmt = $pdo->query($query);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getMonthlySales($pdo) {
    $query = "SELECT DATE_FORMAT(order_date, '%Y-%m') AS month, SUM(sd.Total_Amount) AS total_sales
              FROM sale s
              JOIN saledetail sd ON s.SaleId = sd.saleID
              GROUP BY DATE_FORMAT(order_date, '%Y-%m')";
    $stmt = $pdo->query($query);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getYearlySales($pdo) {
    $query = "SELECT YEAR(order_date) AS year, SUM(sd.Total_Amount) AS total_sales
              FROM sale s
              JOIN saledetail sd ON s.SaleId = sd.saleID
              GROUP BY YEAR(order_date)";
    $stmt = $pdo->query($query);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getTopCategories($pdo) {
    $query = "SELECT p.category, SUM(sd.Total_Amount) AS total_revenue
              FROM products p
              JOIN saledetail sd ON p.id = sd.ProductID
              GROUP BY p.category
              ORDER BY total_revenue DESC";
    $stmt = $pdo->query($query);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


// Handle requests
header('Content-Type: application/json');
$action = $_GET['action'] ?? '';
switch ($action) {
    case 'most_sold':
        echo json_encode(getMostSoldProducts($pdo));
        break;
    case 'top_customers':
        echo json_encode(getTopLoyalCustomers($pdo));
        break;
    case 'daily_sales':
        echo json_encode(getDailySales($pdo));
        break;
    case 'monthly_sales':
        echo json_encode(getMonthlySales($pdo));
        break;
    case 'yearly_sales':
        echo json_encode(getYearlySales($pdo));
        break;
    case 'top_categories':
        echo json_encode(getTopCategories($pdo));
        break;
    default:
        echo json_encode(['error' => 'Invalid action']);
}
?>
