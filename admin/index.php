<?php 
require_once "../database/PDO.php";
require_once "sidebar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1E1E2F;
            color: white;
        }
        h1, h2 {
            text-align: center;
        }
    </style>
</head>
<body class="flex flex-col md:flex-row">

    <!-- Sidebar -->
    <div class="w-full md:w-1/5 bg-[#1E1E2F] p-4">
        <?php require_once "sidebar.php" ?>
    </div>

    <!-- Dashboard -->
    <div class="w-full md:w-4/5 p-6 bg-[#1E1E2F]">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mb-6">
            <!-- Cards -->
            <?php
            $totalSold = 0; $totalRevenue = 0; $totalCustomers = 0;

            // Fetch data from database
            $totalSoldQuery = $pdo->query("SELECT SUM(Quantity) as totalSold, SUM(Total_Amount) as totalRevenue FROM saledetail");
            if ($row = $totalSoldQuery->fetch()) {
                $totalSold = $row['totalSold'];
                $totalRevenue = $row['totalRevenue'];
            }

            $totalCustomersQuery = $pdo->query("SELECT COUNT(*) as totalCustomers FROM customers");
            if ($row = $totalCustomersQuery->fetch()) {
                $totalCustomers = $row['totalCustomers'];
            }
            ?>

            <div class="p-4 bg-[#1E1E2F] border-2 border-white rounded shadow">
                <h3 class="text-xl font-bold text-white">Total Sold</h3>
                <p class="text-2xl mt-2 text-white"><?= $totalSold; ?></p>
            </div>
            <div class="p-4 bg-[#1E1E2F] border-2 border-white rounded shadow">
                <h3 class="text-xl font-bold text-white">Total Revenue</h3>
                <p class="text-2xl mt-2 text-white">$<?= number_format($totalRevenue, 2); ?></p>
            </div>
            <div class="p-4 bg-[#1E1E2F] border-2 border-white rounded shadow">
                <h3 class="text-xl font-bold text-white">Total Customers</h3>
                <p class="text-2xl mt-2 text-white"><?= $totalCustomers; ?></p>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Pie Chart -->
            <div class="p-6 bg-[#2C2C3E] rounded shadow">
                <h2 class="text-xl font-semibold mb-4">Top Categories by Sales</h2>
                <canvas id="topCategoriesChart"></canvas>
            </div>

            <!-- Bar Chart -->
            <div class="p-6 bg-[#2C2C3E] rounded shadow">
                <h2 class="text-xl font-semibold mb-4">Top 10 Most Sold Products</h2>
                <canvas id="mostSoldChart"></canvas>
            </div>

            <div class="p-6 bg-[#2C2C3E] rounded shadow">
                <h2 class="text-xl font-semibold mb-4">Top 10 Loyal Customers</h2>
                <canvas id="topCustomersChart"></canvas>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
            <!-- Line Chart -->
            <div class="p-6 bg-[#2C2C3E] rounded shadow mb-4">
                <h2 class="text-xl font-semibold mb-4">Daily Sales</h2>
                <canvas id="dailySalesChart"></canvas>
            </div>

            <div class="p-6 bg-[#2C2C3E] rounded shadow mb-4">
                <h2 class="text-xl font-semibold mb-4">Monthly Sales</h2>
                <canvas id="monthlySalesChart"></canvas>
            </div>

            <div class="p-6 bg-[#2C2C3E] rounded shadow mb-4">
                <h2 class="text-xl font-semibold mb-4">Yearly Sales</h2>
                <canvas id="yearlySalesChart"></canvas>
            </div>
        </div>
    </div>

    <script>
        async function fetchData(action) {
            const response = await fetch(`chart.php?action=${action}`);
            return response.json();
        }

        async function renderCharts() {
            // Most Sold Products
            const mostSoldData = await fetchData('most_sold');
            new Chart(document.getElementById('mostSoldChart'), {
                type: 'bar',
                data: {
                    labels: mostSoldData.map(item => item.name),
                    datasets: [{
                        label: 'Units Sold',
                        data: mostSoldData.map(item => item.total_sold),
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                }
            });

            // Top Customers
            const topCustomersData = await fetchData('top_customers');
            new Chart(document.getElementById('topCustomersChart'), {
                type: 'bar',
                data: {
                    labels: topCustomersData.map(item => item.name),
                    datasets: [{
                        label: 'Purchases',
                        data: topCustomersData.map(item => item.total_purchases),
                        backgroundColor: 'rgba(153, 102, 255, 0.2)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 1
                    }]
                }
            });

            // Daily Sales
            const dailySalesData = await fetchData('daily_sales');
            new Chart(document.getElementById('dailySalesChart'), {
                type: 'line',
                data: {
                    labels: dailySalesData.map(item => item.date),
                    datasets: [{
                        label: 'Total Sales',
                        data: dailySalesData.map(item => item.total_sales),
                        backgroundColor: 'rgba(255, 159, 64, 0.2)',
                        borderColor: 'rgba(255, 159, 64, 1)',
                        borderWidth: 1
                    }]
                }
            });

            // Monthly Sales
            const monthlySalesData = await fetchData('monthly_sales');
            new Chart(document.getElementById('monthlySalesChart'), {
                type: 'line',
                data: {
                    labels: monthlySalesData.map(item => item.month),
                    datasets: [{
                        label: 'Total Sales',
                        data: monthlySalesData.map(item => item.total_sales),
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                }
            });

            // Yearly Sales
            const yearlySalesData = await fetchData('yearly_sales');
            new Chart(document.getElementById('yearlySalesChart'), {
                type: 'line',
                data: {
                    labels: yearlySalesData.map(item => item.year),
                    datasets: [{
                        label: 'Total Sales',
                        data: yearlySalesData.map(item => item.total_sales),
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }]
                }
            });

            // Top Categories by Sales
            const topCategoriesData = await fetchData('top_categories');
            new Chart(document.getElementById('topCategoriesChart'), {
                type: 'pie',
                data: {
                    labels: topCategoriesData.map(item => item.category),
                    datasets: [{
                        label: 'Revenue',
                        data: topCategoriesData.map(item => item.total_revenue),
                        backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40'],
                    }]
                }
            });
        }

        renderCharts();
    </script>
</body>
</html>
