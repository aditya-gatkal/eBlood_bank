<?php
include("db_connect.php"); // Include your database connection file
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Become a Donor</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to CSS -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>

<div class="container">
    <h2><i class="fas fa-heartbeat"></i> Become a Donor</h2>

    <form action="donor_register_process.php" method="POST">
    <label for="name">Full Name:</label>
    <input type="text" name="name" required>

    <label for="blood_group">Blood Group:</label>
    <select name="blood_group" required>
        <option value="A+">A+</option>
        <option value="A-">A-</option>
        <option value="B+">B+</option>
        <option value="B-">B-</option>
        <option value="O+">O+</option>
        <option value="O-">O-</option>
        <option value="AB+">AB+</option>
        <option value="AB-">AB-</option>
    </select>

    <label for="contact">Contact:</label>
    <input type="text" name="contact" required>

    <label for="city">City:</label>
    <input type="text" name="city" required>

    <button type="submit">Register</button>
</form>

</div>

</body>
</html>
