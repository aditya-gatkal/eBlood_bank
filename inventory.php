<?php
include 'db_connect.php'; // Database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Inventory - eBlood Bank</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to CSS -->
</head>
<body>

    <!-- Navigation Bar -->
    <nav>
        <div class="logo">eBlood Bank</div>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="donors.php">Donors</a></li>
            <li><a href="request.php">Request Blood</a></li>
            <li><a href="inventory.php">Inventory</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </nav>

    <!-- Inventory Table -->
    <section class="inventory">
        <h2>Blood Inventory</h2>
        <table>
            <tr>
                <th>Blood Group</th>
                <th>Available Units</th>
            </tr>
            
            <?php
            $query = "SELECT blood_group, COUNT(*) as units FROM donors GROUP BY blood_group";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row['blood_group']."</td>
                            <td>".$row['units']."</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='2'>No data available</td></tr>";
            }
            ?>
        </table>
    </section>

</body>
</html>
 