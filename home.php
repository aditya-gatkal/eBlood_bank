<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eBlood Bank - Home</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to CSS -->
</head>
<body>
    <header>
        <div class="header-container">
            <img src="/eBlood_bank/images/logx.jpg.jpg" alt="Logo" width="150">
            <h1>Welcome to eBlood Bank</h1>
        </div>
    </header>
    
    <nav>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="donors.php">Donors</a></li>
            <li><a href="request.php">Request Blood</a></li>
            <li><a href="inventory.php">Blood Inventory</a></li>
            <li><a href="admin">Admin</a></li>
        </ul>
    </nav>

    <section class="hero">
        <div class="hero-content">
            <h2>Give Blood, Save Lives</h2>
            <p>Join us in making a difference by donating blood today.</p>
            <a href="request.php" class="btn">Request Blood</a>
            <a href="donors.php" class="btn">Find Donors</a>
        </div>
    </section>

</body>
</html>