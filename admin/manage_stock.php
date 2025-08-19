<?php
session_start();
include("../db_connect.php");

if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

echo "<h2>Manage Blood Stock</h2>";
echo "<p>Here you will add blood stock management functionality.</p>";
?>
<a href="admin_dashboard.php">Back to Dashboard</a>
