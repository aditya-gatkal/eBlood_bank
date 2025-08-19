<?php
include 'db_connect.php'; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Fetch existing donor data
    $query = "SELECT * FROM donors WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $donor = mysqli_fetch_assoc($result);

    if (!$donor) {
        die("Donor not found!");
    }
} else {
    die("Invalid request!");
}

// Update donor details
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $blood_group = $_POST["blood_group"];
    $contact = $_POST["contact"];
    $city = $_POST["city"];

    $updateQuery = "UPDATE donors SET name='$name', blood_group='$blood_group', contact='$contact', city='$city' WHERE id=$id";
    
    if (mysqli_query($conn, $updateQuery)) {
        echo "<script>alert('Donor updated successfully!'); window.location='donors.php';</script>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Donor</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Edit Donor</h2>
    <form method="POST">
        <label>Name:</label>
        <input type="text" name="name" value="<?= $donor['name'] ?>" required>

        <label>Blood Group:</label>
        <input type="text" name="blood_group" value="<?= $donor['blood_group'] ?>" required>

        <label>Contact:</label>
        <input type="text" name="contact" value="<?= $donor['contact'] ?>" required>

        <label>City:</label>
        <input type="text" name="city" value="<?= $donor['city'] ?>" required>

        <button type="submit">Update Donor</button>
    </form>
</body>
</html>
