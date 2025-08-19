<?php
include 'db_connect.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["full_name"];
    $blood_group = $_POST["blood_group"];
    $contact = $_POST["contact"];
    $location = $_POST["location"];
    $status = "Pending"; // Default status

    // SQL query to insert data
    $sql = "INSERT INTO requests (full_name, blood_group, contact, location, status) 
            VALUES ('$name', '$blood_group', '$contact', '$location', '$status')";

    if ($conn->query($sql) === TRUE) { // Use $conn instead of $connection
        echo "<script>alert('Blood request submitted successfully!');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Blood</title>
    <link rel="stylesheet" href="style.css"> <!-- Link your CSS -->
</head>
<body>
    <div class="container">
        <h2>Request Blood</h2>
        <form action="request.php" method="POST">
            <label for="name">full_name:</label>
            <input type="text" name="full_name" required>

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

            <label for="contact">Contact Number:</label>
            <input type="text" name="contact" required>

            <label for="location">Location:</label>
            <input type="text" name="location" required>

            <button type="submit">Submit Request</button>
        </form>
    </div>
</body>
</html>
