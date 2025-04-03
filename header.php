<?php
session_start();

// Simulating a session-based login system
$is_logged_in = isset($_SESSION['user_id']);
$cart_count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
?>
<style>
        .navbar-nav .nav-link {
            font-size: 18px; /* Change this value to your desired font size */
        }
        .nav-item:hover{
            background-color: green;
        }
    </style>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <!-- <a class="navbar-brand" href="#">Navbar</a> -->
    <a class="navbar-brand" href="index_new.php">
            <img src="images/logo.png" alt="Company Logo" height="60">
        </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- <ul class="navbar-nav me-auto mb-2 mb-lg-0"> -->
      <ul class="navbar-nav ms-auto">
      <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                <li class="nav-item"><a class="nav-link" href="shop.php">Shop</a></li>
                <li class="nav-item"><a class="nav-link" href="promotions.php">Promotions</a></li>
                <li class="nav-item"><a class="nav-link" href="rewards.php">Rewards</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>


                <!-- Login/Welcome + Cart -->
            <!-- <div class="d-flex gap-3"> -->
            <?php if (isset($_SESSION['username'])): ?>
                    <!-- If user is logged in -->
                    <span class="nav-link">👋 Welcome, <?php echo htmlspecialchars($_SESSION['fname']); ?>!</span>
                    <a class="nav-link" href="logout.php">Logout</a>
                <?php else: ?>
                    <!-- If no user is logged in -->
                    <a class="nav-link" href="login_user.php">
                        <img src="images/login1.png">Login
                    </a>
                <?php endif; ?>


                
                <!-- <?php if ($is_logged_in): ?> -->
                    <!-- <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li> -->
                <!-- <?php else: ?> -->
                    <!-- <li class="nav-item"><a class="nav-link" href="login_user.php">Login</a></li> -->
                <?php endif; ?>

                <!-- Cart with Counter -->
                <li class="nav-item">
                    <a class="nav-link" href="shoppingcart.php">
                        Cart <span id="cart-count" class="badge bg-danger"><?php echo $cart_count; ?></span>
                        <!-- <img src="images/cart1.png"><span id="cart-count" class="cart-badge">0</span>Cart -->
                    </a>
                </li>
      </ul>
      <!-- <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
    </div>
  </div>
</nav>

<script>
    document.addEventListener("DOMContentLoaded", function () {
    const searchBar = document.getElementById("search-input");
    const dropdown = document.getElementById("dropdown-results");
    let cartBadge = document.getElementById("cart-count");
    let collections = [];
    
    let logoutBtn = document.getElementById("logoutBtn");

    if (!cartBadge) {
        console.warn("Cart badge not found on this page.");
        return; // Stop execution to prevent errors
    }
    
    let cartCount = localStorage.getItem("cartCount") || 0;

    // Update cart count
    if (cartCount === null) {
        localStorage.setItem("cartCount", 0);
        cartCount = 0;
    } else {
        cartCount = parseInt(cartCount);
    }
        
        updateCartCount(cartCount);
    

    // Fetch JSON data
    fetch("collection.json")
        .then(response => response.json())
        .then(data => {
            collections = data;
        })
        .catch(error => console.error("Error loading JSON:", error));

    // Show dropdown on focus
    searchBar.addEventListener("focus", function () {
        updateDropdown(collections);
    });

    // Hide dropdown when clicking outside
    document.addEventListener("click", function (event) {
        if (!searchBar.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.style.display = "none";
        }
    });

    // Filter collections based on input
    searchBar.addEventListener("input", function () {
        const searchTerm = searchBar.value.toLowerCase();
        const filteredCollections = collections.filter(collection =>
            collection.name.toLowerCase().includes(searchTerm)
        );
        updateDropdown(filteredCollections);
    });

    

if (logoutBtn) {
        logoutBtn.addEventListener("click", function (e) {
            e.preventDefault(); // Prevent default link behavior

            fetch("logout.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    alert(data.message);
                    window.location.href = "index.php"; // Redirect to homepage
                }
            })
            .catch(error => console.error("Error:", error));
        });
    }
    
});
function updateDropdown(data) {
        dropdown.innerHTML = "";
        if (data.length === 0) {
            dropdown.style.display = "none";
            return;
        }

        data.forEach(collection => {
            let item = document.createElement("a");
            item.href = `shop.html?collection=${encodeURIComponent(collection.name)}`;
            item.className = "collection-item";
            item.innerHTML = `<img src="${collection.image}" alt="${collection.name}">
                              <span>${collection.name}</span>`;
            dropdown.appendChild(item);
        });

        dropdown.style.display = "block";
    }

    function updateCartCount(count) {
        let cartBadge = document.getElementById("cart-count");
    if (cartBadge) {
        cartBadge.textContent = count;
    }
}
    
</script>