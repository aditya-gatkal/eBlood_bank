<?php
session_start();
include("../db_connect.php");

if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $blood_group = $_POST['blood_group'];
    $quantity = $_POST['quantity'];

    $query = "INSERT INTO blood_stock (blood_group, quantity) VALUES ('$blood_group', '$quantity')";
    
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Blood stock added successfully!'); window.location.href='manage_blood_stock.php';</script>";
    } else {
        echo "<script>alert('Error adding stock. Try again!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Blood Stock</title>
    <link rel="stylesheet" href="admin_style.css">
</head>
<body>

<div class="container">
    <h2>Add Blood Stock</h2>
    <form action="" method="POST">
        <label>Blood Group:</label>
        <select name="blood_group" required>
            <option value="">Select Blood Group</option>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
        </select>

        <label>Quantity (Units):</label>
        <input type="number" name="quantity" min="1" required>

        <button type="submit" class="add-btn">Add Stock</button>
    </form>
</div>

</body>
</html>
