<?php
session_start();
?>

<nav class="navbar navbar-light bg-light">
    <div class="container-fluid navbar-container">
        <div class="navbar-top">
            <!-- ✅ Logo -->
            <div class="logo-container">
                <a class="navbar-brand" href="index.html">
                    <img src="images/logo.png" alt="Brand Logo">
                </a>
            </div>

            <!-- ✅ Search Bar -->
            <form class="d-flex search-bar">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-success btn-lg search-btn">Search</button>
            </form>

            <!-- ✅ Login/Welcome + Cart -->
            <div class="d-flex gap-3">
                <?php if (isset($_SESSION['user'])): ?>
                    <!-- If user is logged in -->
                    <span class="nav-link">👋 Welcome, <?php echo htmlspecialchars($_SESSION['user']['name']); ?>!</span>
                    <a class="nav-link" href="logout.php">Logout</a>
                <?php else: ?>
                    <!-- If no user is logged in -->
                    <a class="nav-link" href="login.html">
                        <img src="images/login1.png">Login
                    </a>
                <?php endif; ?>
                
                <!-- ✅ Cart Link -->
                <a class="nav-link" href="shoppingcart.html">
                    <img src="images/cart1.png">Cart
                </a>
            </div>
        </div>
    </div>

    <!-- ✅ Navigation Links -->
    <div class="navbar-bottom">
        <ul class="navbar-nav d-flex flex-row">
            <li class="nav-item">
                <a class="nav-link" href="about.html">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="shop.html">Shop</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="promotions.html">Promotions</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="rewards.html">Rewards</a>
            </li>
        </ul>
    </div>
</nav>
