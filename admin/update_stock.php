<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM blood_stock WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $quantity = $_POST['quantity'];

    $query = "UPDATE blood_stock SET quantity='$quantity' WHERE id='$id'";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Stock updated successfully'); window.location='manage_blood_stock.php';</script>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Blood Stock</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Update Blood Stock</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label>Blood Group: </label>
        <input type="text" value="<?php echo $row['blood_group']; ?>" readonly><br><br>
        <label>Quantity: </label>
        <input type="number" name="quantity" value="<?php echo $row['quantity']; ?>" required><br><br>
        <button type="submit" name="update">Update Stock</button>
    </form>
</body>
</html>
