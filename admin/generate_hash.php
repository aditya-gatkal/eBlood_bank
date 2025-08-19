<?php
$password = "Aditya@123"; // Change to your desired password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
echo "New Hashed Password: " . $hashed_password;
?>
