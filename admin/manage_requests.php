<?php
session_start();
include("../db_connect.php");

if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

// Fetch blood requests from the database
$search = "";
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $query = "SELECT * FROM blood_requests WHERE patient_name LIKE '%$search%' OR blood_group LIKE '%$search%' ORDER BY id DESC";
} else {
    $query = "SELECT * FROM blood_requests ORDER BY id DESC";
}

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Blood Requests</title>
    <link rel="stylesheet" href="admin_style.css">
</head>
<body>
    <div class="container">
        <h2>Manage Blood Requests</h2>
        <form method="GET">
    <input type="text" name="search" placeholder="Search by Name or Blood Group">
    <button type="submit">Search</button>
</form>

        <a href="add_request.php" class="add-button">➕ Add Request</a>
        <table border="1">
            <tr>
                <th>S.No</th>
                <th>Patient Name</th>
                <th>Blood Group</th>
                <th>Contact</th>
                <th>Hospital</th>
                <th>Status</th>
                <th>Date Requested</th>
            </tr>
            <?php
$serial = 1;
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
        <td>{$serial}</td>
        <td>{$row['patient_name']}</td>
        <td>{$row['blood_group']}</td>
        <td>{$row['contact']}</td>
        <td>{$row['hospital']}</td>
        <td>{$row['status']}</td>
        <td>{$row['date_requested']}</td>
        <td>
            <a href='update_request.php?id={$row['id']}&status=approved' class='approve-btn'>✔ Approve</a>
            <a href='update_request.php?id={$row['id']}&status=rejected' class='reject-btn'>❌ Reject</a>
        </td>
    </tr>";
    $serial++;
}
?>

        </table>
        <br>
        <a href="admin_dashboard.php">Back to Dashboard</a>
    </div>
</body>
</html>
