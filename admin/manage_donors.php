<?php
session_start();
include("../db_connect.php");

if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

// Fetch donors from the database
$query = "SELECT * FROM donors ORDER BY id DESC";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Donors</title>
    
    <link rel="stylesheet" href="admin_style.css">
</head>
<body>
    <div class="container">
        <h2>Manage Donors</h2>
        <a href="add_donor.php" class="add-button">➕ Add Donor</a>

        <table border="1">
        <tr>
    <th>S.No</th> <!-- New Column for Serial Number -->
    <th>Name</th>
    <th>Blood Group</th>
    <th>Contact</th>
    <th>City</th>
    <th>Date Registered</th>
</tr>

<?php
$serial = 1; // Start Serial No.
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
        <td>{$serial}</td> <!-- Display Serial Number -->
        <td>{$row['name']}</td>
        <td>{$row['blood_group']}</td>
        <td>{$row['contact']}</td>
        <td>{$row['city']}</td>
        <td>{$row['date_registered']}</td>
    </tr>";
    $serial++; // Increase Serial No. for next row
}
?>

        </table>
        <br>
        <a href="admin_dashboard.php">Back to Dashboard</a>
    </div>
</body>
</html>
