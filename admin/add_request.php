<?php
session_start();
include("../db_connect.php");

if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patient_name = $_POST['patient_name'];
    $blood_group = $_POST['blood_group'];
    $contact = $_POST['contact'];
    $hospital = $_POST['hospital'];

    $query = "INSERT INTO blood_requests (patient_name, blood_group, contact, hospital, status) VALUES ('$patient_name', '$blood_group', '$contact', '$hospital', 'pending')";

    if (mysqli_query($conn, $query)) {
        $success = "Blood request added successfully!";
    } else {
        $error = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Blood Request</title>
    <link rel="stylesheet" href="admin_style.css">
</head>
<body>
    <div class="container">
        <h2>Add Blood Request</h2>
        <?php
        if (isset($success)) echo "<p class='success'>$success</p>";
        if (isset($error)) echo "<p class='error'>$error</p>";
        ?>
        <form method="POST">
            <input type="text" name="patient_name" placeholder="Patient Name" required>
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
            <input type="text" name="hospital" placeholder="Hospital Name" required>
            <button type="submit">Add Request</button>
        </form>
        <br>
        <a href="manage_requests.php">Back to Requests</a>
    </div>
</body>
</html>
