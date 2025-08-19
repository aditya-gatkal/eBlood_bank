<?php
session_start();
include("../db_connect.php"); // Database connection

if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

// Fetch blood stock from database
$query = "SELECT * FROM blood_stock";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Blood Stock - eBlood Bank</title>
    <link rel="stylesheet" href="admin_style.css"> <!-- External CSS -->
</head>
<body>

<div class="container">
    <h2>Manage Blood Stock</h2>
    
    <table>
        <thead>
            <tr>
                <th>Blood Type</th>
                <th>Quantity (Units)</th>
                <th>Last Updated</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo isset($row['blood_group']) ? $row['blood_group'] : 'Unknown'; ?></td>
            <td><?php echo isset($row['quantity']) ? $row['quantity'] . ' Units' : '0 Units'; ?></td>
            <td><?php echo isset($row['last_updated']) ? date("d M Y", strtotime($row['last_updated'])) : 'Not Updated'; ?></td>
            <td>
    <a href="edit_stock.php?id=<?php echo $row['id']; ?>" class="edit-btn">Edit</a>
    <a href="delete_stock.php?id=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this stock?');">Delete</a>
              </td>  

        </tr>
    <?php } ?>
</tbody>

    </table>

    <a href="add_stock.php" class="add-btn">+ Add Blood Stock</a>
</div>

</body>
</html>
