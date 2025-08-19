<?php
session_start();
if (isset($_SESSION['admin'])) {
    header("Location: admin_dashboard.php"); // Redirect to dashboard if already logged in
    exit();
} else {
    header("Location: admin_login.php"); // Redirect to login page if not logged in
    exit();
}
?>
