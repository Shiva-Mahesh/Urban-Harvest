<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Urban Harvest - Shopping Cart</title>
</head>
<link rel = "stylesheet" href = "style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://use.typekit.net/sfi7vlm.css">
<body>
 
    <main>
        <div class="container my-5">
            <h1>Shopping Cart</h1>
            <div id="cart-container" class="cart-items">
        
            </div>
            <div class="cart-summary">
              <h3>Order Summary</h3>
              <p>Subtotal: <span id="subtotal">$0.00</span></p>
              <p>Tax: <span id="tax">$0.00</span></p>
              <p>Total: <span id="total">$0.00</span></p>
              <p style='color:green;'>Discount: <span id="discount">$0.00</span></p>
              <p> Total Carbon Credits: <span id = "totalCarbonCredit"> </span></p>
              <a href="#" class="btn btn-success btn-lg w-100" onclick="checkLogin()">Proceed to Checkout</a>

              <!-- <a href="checkout.php" class="btn btn-success btn-lg w-100">Proceed to Checkout</a> -->
               <script> function checkLogin() {
    fetch('check_login.php')
        .then(response => response.json())
        .then(data => {
            if (data.logged_in) {
                window.location.href = "checkout.php";
            } else {
                alert("Please login to proceed to checkout.");
                window.location.href = "login_user.php";
            }
        })
        .catch(error => console.error('Error:', error));
} </script>
            </div>
          </div>
    </main>



    <footer class="footer">
      
        <div class="row">

           
            <div class="col-md-3">
                <div class="footer-logo">
                    <img src="images/logo.png" alt="Urban Harvest Logo">
                </div>
                <div class="footer-logo-text">
                <p>
                    Discover fresh, high-quality vegetables and fruits, fresh from the farm to your doorstep. 
                    Enjoy convenient shopping and competitive prices. Eat fresh, live healthy!
                </p>
            </div>
            </div>
        
            <div class="subscribe col-md-3">
                <h5>Sign up to get the latest specials and exclusive deals!</h5>
                <input type="email" placeholder="Email Address*" aria-label="Email Address">
                <button class="btn btn-success btn-lg">Sign Up</button>
            </div>

            <div class="col-md-2">
                <h5 class="footer-header">More Info</h5>
                <p><a href="shop.php" class="text-white">Products</a></p>
                            <p><a href="about.php" class="text-white">About Us</a></p>
                            <p><a href="sustainability.php" class="text-white">Sustainability</a></p>
                            <p><a href="rewards.php" class="text-white">Carbon Credits</a></p>
            </div>

            <div class="col-md-2">
                <h5 class="footer-header">Let's Connect</h5>
                        <div class="social-icons">
                            <a href="#"><img src = "images/facebook.png"></a>
                            <a href="#"><img src = "images/pinterest.png"></a>
                        </div>
                        <div class="social-icons">
                            <a href="#"><img src = "images/youtube.png"></a>
                            <a href="#"><img src = "images/instagram.png"></a>
                        </div>
            </div>

            <div class="col-md-2">
                <h5 class="footer-header"><a href = 'contact.html'>Contact Us </a></h5>
            <p>1234 Victoria Street <br> Kitchener, ON N2B 3E6</p>
            <p>526.731.3838</p>
            <p>info@urbanharvest.com</p>
            </div>

    </div>

    <hr>

    <div class="footer-bottom">
        <p>&copy; 2022-2025. All rights reserved</p>
    </div>
</div>




</footer>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="cart_new.js"></script>
</body>
</html>