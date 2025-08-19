<?php
include 'db_connect.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = isset($_POST["name"]) ? $_POST["name"] : "";
    $blood_group = isset($_POST["blood_group"]) ? $_POST["blood_group"] : "";
    $contact = isset($_POST["contact"]) ? $_POST["contact"] : "";
    $city = isset($_POST["city"]) ? $_POST["city"] : "";

    // Validate input (basic validation)
    if (empty($name) || empty($blood_group) || empty($contact) || empty($city)) {
        echo "<script>alert('All fields are required!'); window.history.back();</script>";
        exit();
    }

    // SQL query to insert data
    $query = "INSERT INTO donors (name, blood_group, contact, city, date_registered) 
              VALUES ('$name', '$blood_group', '$contact', '$city', NOW())";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Donor registered successfully!'); window.location.href='donors.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
}
?>
