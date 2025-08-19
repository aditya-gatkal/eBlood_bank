<?php
session_start();
include("../db_connect.php");

if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = $_GET['id'];
    $status = $_GET['status'];

    $query = "UPDATE blood_requests SET status='$status' WHERE id=$id";
    if (mysqli_query($conn, $query)) {
        header("Location: manage_requests.php?message=updated");
        exit();
    } else {
        echo "Error updating request: " . mysqli_error($conn);
    }
}
?>
