<?php
session_start();
include("../db_connect.php");

if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: manage_blood_stock.php");
    exit();
}

$id = $_GET['id'];
$query = "SELECT * FROM blood_stock WHERE id = $id";
$result = mysqli_query($conn, $query);
$stock = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $blood_group = $_POST['blood_group'];
    $quantity = $_POST['quantity'];

    $update_query = "UPDATE blood_stock SET blood_group='$blood_group', quantity='$quantity', last_updated=NOW() WHERE id=$id";

    if (mysqli_query($conn, $update_query)) {
        echo "<script>alert('Blood stock updated successfully!'); window.location.href='manage_blood_stock.php';</script>";
    } else {
        echo "<script>alert('Error updating stock. Try again!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Blood Stock</title>
    <link rel="stylesheet" href="admin_style.css">
</head>
<body>

<div class="container">
    <h2>Edit Blood Stock</h2>
    <form action="" method="POST">
        <label>Blood Group:</label>
        <select name="blood_group" required>
            <option value="A+" <?= ($stock['blood_group'] == "A+") ? "selected" : "" ?>>A+</option>
            <option value="A-" <?= ($stock['blood_group'] == "A-") ? "selected" : "" ?>>A-</option>
            <option value="B+" <?= ($stock['blood_group'] == "B+") ? "selected" : "" ?>>B+</option>
            <option value="B-" <?= ($stock['blood_group'] == "B-") ? "selected" : "" ?>>B-</option>
            <option value="O+" <?= ($stock['blood_group'] == "O+") ? "selected" : "" ?>>O+</option>
            <option value="O-" <?= ($stock['blood_group'] == "O-") ? "selected" : "" ?>>O-</option>
            <option value="AB+" <?= ($stock['blood_group'] == "AB+") ? "selected" : "" ?>>AB+</option>
            <option value="AB-" <?= ($stock['blood_group'] == "AB-") ? "selected" : "" ?>>AB-</option>
        </select>

        <label>Quantity (Units):</label>
        <input type="number" name="quantity" value="<?= $stock['quantity'] ?>" min="1" required>

        <button type="submit" class="edit-btn">Update Stock</button>
    </form>
</div>

</body>
</html>
