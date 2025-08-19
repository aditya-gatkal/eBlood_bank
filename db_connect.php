<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Start session only if not already started
}

$servername = "127.0.0.1";
$username = "root";
$password = "Aditya@04"; // Change to empty if no password
$database = "blood_bank_new";
$port = 3307; // Change if needed

// Create connection
$conn = new mysqli($servername, $username, $password, $database, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}  
?>
