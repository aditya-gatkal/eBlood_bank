<?php
include("../db_connect.php"); // Correct path to include database connection

$username = 'aditya'; // Change to your actual username
$input_password = 'Aditya@123'; // Enter your actual password

// Prepare SQL query
$query = "SELECT password FROM admin WHERE username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $stored_hash = $row['password'];

    echo "Stored Hash: " . $stored_hash . "<br>";

    // Verify password
    if (password_verify($input_password, $stored_hash)) {
        echo "✅ Password matches!";
    } else {
        echo "❌ Password does NOT match!";
    }
} else {
    echo "❌ No user found with username: " . $username;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
