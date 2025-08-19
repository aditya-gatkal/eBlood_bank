<?php
session_start();
include("../db_connect.php");

if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete stock from database
    $query = "DELETE FROM blood_stock WHERE id = $id";
    
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Blood stock deleted successfully!'); window.location.href='manage_blood_stock.php';</script>";
    } else {
        echo "<script>alert('Error deleting stock. Try again!'); window.location.href='manage_blood_stock.php';</script>";
    }
} else {
    header("Location: manage_blood_stock.php");
    exit();
}
?>
