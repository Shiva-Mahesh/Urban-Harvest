<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Urban Harvest - Promotions</title>
</head>
<link rel = "stylesheet" href = "style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://use.typekit.net/sfi7vlm.css">
<body>

  
    <main>
        <section class="promotions">
            <div class="container my-5">
                <div class="row">
                    <!-- Left column -->
                   
                    <div class="col-md-6">
                        <div class="content">
                        <h1 style="color:rgb(8, 59, 8);">Exclusive Promotions on Fresh Organic Produce</h1>
                        <p>Take advantage of our limited-time offers and enjoy discounts on our organic, locally sourced produce! Whether you're a new customer or a loyal subscriber, there's something for everyone. Sign up now and get your first delivery at a special price, or explore our curated box of the week. Fresh,healthy and locally grown—delivered straight to your door!.</p>
                    </div>
                    </div>
                    <!-- Right column -->
                    <div class="col-md-6">
                        <img src='./Images/Promotion_Image.jpg' class="img-fluid promotions_image">
                    </div>
                </div>
            </div>
        
            <!-- Container for dynamic produce items -->
        
            <div id="produce-container" class="d-flex flex-wrap">
                <!-- Dynamically items will be inserted here -->  
           
              
            
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
    <script src="promotions_new.js"></script>

</body>
</html>