<?php
include 'db_connect.php'; // Connect to database

$sql = "SELECT * FROM donors";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donors List</title>
    <link rel="stylesheet" href="style.css"> <!-- Link your CSS -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }

        .container {
            width: 90%;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        h2 {
            text-align: center;
            color: #c62828;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background: #c62828;
            color: white;
            font-size: 1.2rem;
        }

        tr:nth-child(even) {
            background: #ffe0e0;
        }

        .action-btn {
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 5px;
            font-size: 14px;
            transition: 0.3s;
        }

        .edit-btn {
            background: #ffc107;
            color: white;
        }

        .edit-btn:hover {
            background: #ff9800;
        }

        .add-btn {
            display: inline-block;
            margin-bottom: 15px;
            background: #28a745;
            color: white;
            padding: 10px 15px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }

        .add-btn:hover {
            background: #218838;
        }

        .icon {
            margin-right: 5px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2><i class="fas fa-users icon"></i> Donors List</h2>
        <a href="donor_registration.php" class="add-btn"><i class="fas fa-user-plus"></i> Add Donor</a>
        
        <table>
            <tr>
                <th><i class="fas fa-user"></i> Name</th>
                <th><i class="fas fa-tint"></i> Blood Group</th>
                <th><i class="fas fa-phone"></i> Contact</th>
                <th><i class="fas fa-map-marker-alt"></i> City</th>
                <th><i class="fas fa-edit"></i> Edit</th>
            </tr>

            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['name']}</td>
                            <td>{$row['blood_group']}</td>
                            <td>{$row['contact']}</td>
                            <td>{$row['city']}</td>
                            <td>
                                <a href='update_donor.php?id={$row['id']}' class='action-btn edit-btn'><i class='fas fa-edit'></i> Edit</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No donors found.</td></tr>";
            }
            ?>
        </table>
    </div>

</body>
</html>

<?php $conn->close(); ?>
