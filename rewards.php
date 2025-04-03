<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Urban Harvest - Carbon Credits</title>
</head>
<link rel = "stylesheet" href = "style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://use.typekit.net/sfi7vlm.css">
<body>

    <main>

        <section class="reward-section">
            <!-- Left side: Title and Paragraph -->
            <div class="reward-content">
              <h1>Join our<span> Carbon Rewards</span> Program</h1>
              <h3>Join the Green Revolution!</h3>
              <p>At Urban Harvest, we’re committed to making sustainability rewarding. With every purchase of our produce, you’ll earn Carbon Points, helping to reduce your environmental footprint while earning rewards. Simply buy eco-friendly products, and you’ll automatically collect points that reflect your positive impact on the planet. The more you shop sustainably, the more you contribute to a greener world. <br><br>
        
                You can easily check your Carbon Points balance at any time through your account dashboard. Simply log in to your profile, and under the “Rewards” section, you’ll see your total points accumulated. Keep track of your points as you shop, and watch your environmental efforts translate into tangible rewards! <br><br>
                
                When you're ready to redeem your points, simply redeem your point before checkout. Here, you can use your points for exclusive discounts, free products, or even donate them to support environmental causes. It’s a simple and rewarding way to make a difference with every purchase!
                
                </p>
            </div>
        
            <!-- Right side: Image -->
            <div class="reward-image">
              <img src="Images/Sunflowers.jpg" alt="Rewards Image" class="img-fluid">
            </div>
          </section>
        
        <!-- Rewards Detail Section -->
        <section class="rewards-details">
            <div class="container">
              <div class="row">
                <!-- Left Column: Quick Points -->
                <div class="left-column">
                  <h4>Start Earning Points Today!</h4>
                  <ul>
                    <li><i class="fa-solid fa-earth-americas"></i>&nbsp&nbsp<strong>Earn Points with Every Purchase:</strong> Get Carbon Points everytime you shop sustainably.</li>
                    <li><i class="fa-solid fa-earth-americas"></i>&nbsp&nbsp<strong>Unlock Special Promotions:</strong> Use your points to access exclusive discounts and offers.</li>
                    <li><i class="fa-solid fa-earth-americas"></i>&nbsp&nbsp<strong>Easy to Earn:</strong> Points are added automatically with qualifying purchases.</li>
                  </ul>
                </div>
          
                <!-- Right Column: Login and Sign Up -->
                <div class="right-column">
                  <!-- Login Form -->
                  <!-- <form id="loginform" class="mb-4 login-form">
                    <div class="form-group">
                      <label for="login-email">Email</label>
                      <input type="email" class="form-control" id="login-email" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group">
                      <label for="login-password">Password</label>
                      <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button class = "btn btn-success btn-lg submit-btn" type="submit">Submit</button>
                  </form>
           -->
                  <!-- Forgot Password Link -->
                  <!-- <a href="#" class="forgot-password-link">Forgot your password?</a> -->

                  <!-- <script>
        document.getElementById("loginform").addEventListener("submit", async function(event) {
            event.preventDefault();

            const email = document.getElementById("email").value;
            const password = document.getElementById("password").value; -->

            <!-- // console.log("Sending request with:", JSON.stringify({ username, pwd: password }));


            // const formData = new FormData();
            // formData.append("email", email);
            // formData.append("password", password);

            // const response = await fetch("login.php", {
            //     method: "POST",
            //     body: formData
                // headers: { "Content-Type": "application/json" },
                // body: JSON.stringify({ email, password })
            // });
            fetch("login.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json", // Sending JSON data
        },
        body: JSON.stringify({ username: email, password: password }), // Send JSON request
    })
    .then(response => response.json()) // Convert response to JSON
    .then(data => {
        if (data.status === "success") {
            alert("Login successful!");
            window.location.href = "index_new.php"; // Redirect on success
        } else {
            alert(data.message); // Show error message
        }
    })
    .catch(error => console.error("Error:", error));
});
          </script> -->
                  <a href="login_user.php" class="btn btn-secondary create-account-btn">Login</a>
                  <hr>
          
                  <!-- Create Account Button -->
                  <a href="new_user.php" class="btn btn-secondary create-account-btn">Create an Account</a>
                </div>
              </div>
            </div>
          </section>
        






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
                        <p><a href="shop.html" class="text-white">Products</a></p>
                        <p><a href="about.html" class="text-white">About Us</a></p>
                        <p><a href="sustainability.html" class="text-white">Sustainability</a></p>
                        <p><a href="rewards.html" class="text-white">Carbon Credits</a></p>
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
    <!-- <script src="script.js"></script> -->

</body>
</html>