<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>F2 Food & Foodie</title>
    <link rel="stylesheet" href="code.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Navigation -->
    <header class="header">
        <nav class="nav">
            <ul class="nav-list">
                <li><a href="#">Home</a></li>
                <li class="menu-item">
                    <a href="#">Menu</a>
                    <ul class="dropdown">
                        <li><a href="pizza.html">Pizza</a></li>
                        <li><a href="burger.html">Burger</a></li>
                        <li><a href="fries.html">Fries</a></li>
                        <li><a href="sandwich.html">Sandwich</a></li>
                        <li><a href="chicken.html">Chicken Items</a></li>
                        <li><a href="dips.html">Dips</a></li>
                        <li><a href="beverages.html">Beverages</a></li>
                    </ul>
                </li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="about.html">About</a></li>
            </ul>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="title">
            <div class="main-title">F2</div>
            <div class="sub-title">FOOD & FOODIE</div>
            <p class="hero-description">Welcome to F2 Food & Foodie — Your one-stop destination for delicious meals and delightful experiences.</p>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <p>© 2025 F2 Food & Foodie. All rights reserved.</p>
    </footer>
</body>
</html>
                <li>
                    <a href="logout.php">Logout</a>
                </li>
            </ul>
        </nav>
    </header>

    <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
    <p>You're logged in. Enjoy exploring!</p>
</body>
</html>
