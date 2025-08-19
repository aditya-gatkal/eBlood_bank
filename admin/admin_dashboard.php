<?php
session_start();
include("../db_connect.php");

if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - eBlood Bank</title>
    <link rel="stylesheet" href="admin_style.css"> <!-- Link to CSS -->
</head>
<body>
    <div class="dashboard-container">
        <h2>Welcome, <?php echo $_SESSION['admin']; ?>!</h2>

        <div class="cards">
            <a href="manage_donors.php" class="card">
                <img src="images/donors.png" alt="Donors">
                <h3>Manage Donors</h3>
            </a>

            <a href="manage_requests.php" class="card">
                <img src="images/requests.png" alt="Requests">
                <h3>Manage Blood Requests</h3>
            </a>

            <a href="manage_blood_stock.php" class="card">  <!-- UPDATED LINK -->
                <img src="images/stock.png" alt="Stock">
                <h3>Manage Blood Stock</h3>
            </a>

            <a href="logout.php" class="card logout">
                <img src="images/logout.png" alt="Logout">
                <h3>Logout</h3>
            </a>
        </div>
    </div>
</body>
</html>
