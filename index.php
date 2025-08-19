<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eBlood Bank - Save Lives</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to CSS -->
</head>
<body>

<!-- Header Section -->
<header>
    <div class="logo">
        <img src="images/logo.png" alt="eBlood Bank">
        <h1>eBlood Bank</h1>
    </div>
    <nav>
        <ul>
        <nav>
    <ul>
    <nav>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="donor_registration.php">Donate Blood</a></li>
        <li><a href="request.php">Request Blood</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="admin/admin_login.php" class="admin-btn">Admin</a></li>

    </ul>
</nav>

    </ul>
</nav>

        </ul>
    </nav>
</header>

<!-- Hero Section -->
<section class="hero">
    <div class="hero-text">
        <h2>Donate Blood, Save Lives</h2>
        <p>Your donation can give someone another chance at life.</p>
        <a href="donor_registration.php" class="btn">Become a Donor</a>
    </div>
</section>

<!-- About Section -->
<section class="about">
    <h2>Why Donate Blood?</h2>
    <div class="about-content">
        <div class="about-box">
            <img src="images/heart.png" alt="Save Lives">
            <h3>Save Lives</h3>
            <p>Every donation helps 3 lives in need of blood.</p>
        </div>
        <div class="about-box">
            <img src="images/health.png" alt="Stay Healthy">
            <h3>Stay Healthy</h3>
            <p>Blood donation reduces heart disease risks.</p>
        </div>
        <div class="about-box">
            <img src="images/community.png" alt="Give Back">
            <h3>Give Back</h3>
            <p>Be a hero in someone's life today.</p>
        </div>
    </div>
</section>

<!-- Blood Stock Availability -->
<section class="blood-stock">
    <h2>Blood Availability</h2>
    <table>
        <tr>
            <th>Blood Group</th>
            <th>Available Units</th>
        </tr>
        <?php
        include("db_connect.php");
        $query = "SELECT * FROM blood_stock";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['blood_group']}</td>
                    <td>{$row['quantity']} Units</td>
                  </tr>";
        }
        ?>
    </table>
</section>

<!-- Footer -->
<footer>
    <p>&copy; 2025 eBlood Bank | Saving Lives Together</p>
</footer>

</body>
</html>
