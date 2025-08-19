<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db_connect.php'; // Ensure this file exists and connects properly

// Check if ID is passed
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("No donor ID provided.");
}

$id = $_GET['id']; // Get the donor ID from the URL

// Fetch donor details from the database
$sql = "SELECT * FROM donors WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    die("No donor found with this ID.");
}

$row = $result->fetch_assoc(); // Fetch donor data

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $blood_group = $_POST['blood_group'];
    $contact = $_POST['contact'];
    $city = $_POST['city'];

    // Update donor details
    $update_sql = "UPDATE donors SET name=?, blood_group=?, contact=?, city=? WHERE id=?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("ssssi", $name, $blood_group, $contact, $city, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Donor details updated successfully!');</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Donor</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Edit Donor Information</h2>
    <form method="POST">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required>
        
        <label>Blood Group:</label>
        <select name="blood_group" required>
            <option value="A+" <?php if ($row['blood_group'] == "A+") echo "selected"; ?>>A+</option>
            <option value="A-" <?php if ($row['blood_group'] == "A-") echo "selected"; ?>>A-</option>
            <option value="B+" <?php if ($row['blood_group'] == "B+") echo "selected"; ?>>B+</option>
            <option value="B-" <?php if ($row['blood_group'] == "B-") echo "selected"; ?>>B-</option>
            <option value="O+" <?php if ($row['blood_group'] == "O+") echo "selected"; ?>>O+</option>
            <option value="O-" <?php if ($row['blood_group'] == "O-") echo "selected"; ?>>O-</option>
            <option value="AB+" <?php if ($row['blood_group'] == "AB+") echo "selected"; ?>>AB+</option>
            <option value="AB-" <?php if ($row['blood_group'] == "AB-") echo "selected"; ?>>AB-</option>
        </select>

        <label>Contact:</label>
        <input type="text" name="contact" value="<?php echo htmlspecialchars($row['contact']); ?>" required>

        <label>City:</label>
        <input type="text" name="city" value="<?php echo htmlspecialchars($row['city']); ?>" required>

        <button type="submit">Update Donor</button>
    </form>
</body>
</html>
