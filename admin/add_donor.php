<?php
session_start();
include("../db_connect.php");

if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $blood_group = $_POST['blood_group'];
    $contact = $_POST['contact'];
    $city = $_POST['city'];

    $query = "INSERT INTO donors (name, blood_group, contact, city) VALUES ('$name', '$blood_group', '$contact', '$city')";
    if (mysqli_query($conn, $query)) {
        $success = "Donor added successfully!";
    } else {
        $error = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Donor</title>
    <link rel="stylesheet" href="admin_style.css">
</head>
<body>
    <div class="container">
        <h2>Add New Donor</h2>
        <?php
        if (isset($success)) echo "<p class='success'>$success</p>";
        if (isset($error)) echo "<p class='error'>$error</p>";
        ?>
        <form method="POST">
            <input type="text" name="name" placeholder="Full Name" required>
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
            <input type="text" name="contact" placeholder="Contact Number" required>
            <input type="text" name="city" placeholder="City" required>
            <button type="submit">Add Donor</button>
        </form>
        <br>
        <a href="manage_donors.php">Back to Donors List</a>
    </div>
</body>
</html>
