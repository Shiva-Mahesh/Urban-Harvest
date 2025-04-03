<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Urban Harvest - Login page</title>
</head>
<link rel = "stylesheet" href = "style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://use.typekit.net/sfi7vlm.css">
<body>
    

<main>


    <div class = "login-container">
        <h2>Login to your account</h2>
        <form id="loginform" autocomplete="off">
            <div class="login-form mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required autocomplete="off">

                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required autocomplete="new-password">
                
                    
    
                   
                    <div class="login-form-controls">
                        <button class = "btn btn-success btn-lg submit-btn" type="submit">Submit</button>
                        <a href="new_user.php" class="create-account">Create an account</a>
                    </div>
    
                    <p id="error-message" style="color: red;"> </p>
            </div>
        </form>
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

    <script>
        document.getElementById("loginform").addEventListener("submit", async function(event) {
            event.preventDefault();

            const email = document.getElementById("email").value;
            const password = document.getElementById("password").value;

            // console.log("Sending request with:", JSON.stringify({ username, pwd: password }));


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
            // const result = await response.json();
            // console.log(result);
            // if (result.includes("Login successful")) {
                // Store session in browser (just for testing)
                // sessionStorage.setItem("user", JSON.stringify(result.user));

                // Redirect to dashboard
        //         window.location.href = "shop.html";
        //     } else {
        //         document.getElementById("error-message").textContent = result.error;
        //     }
        // });
    </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- <script src="script.js"></script> -->
</body>
</html>