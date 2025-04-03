<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Urban Harvest Organic Produce Delivery</title>
    <link rel = "stylesheet" href = "style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/sfi7vlm.css">
</head>
<body>
    
<!------
Header Ends-->
    <div class="container">
        <h1>Produce</h1>
        <div class="mb-3">
            <label for="category-select" class="form-label">Select Category:</label>
            <select id="category-select" class="form-select">
                <option value="All">All</option>
                <option value="Curated Box">Curated Box</option>
                <option value="Vegetables">Vegetables</option>
                <option value="Fruits">Fruits</option>
            </select>
        </div>

        <!-- Container for dynamic produce items -->
        <div id="produce-container" class="d-flex flex-wrap">
            <!-- Dynamic items will be inserted here -->  
        </div>
    </div>
    


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
              <form id="newsletterForm">
              <input type="email" id="newsletter_email" placeholder="Email Address*" aria-label="Email Address">
              <button type="submit" class="btn btn-success btn-lg">Sign Up</button> </form>
          </div>

          <script>
              document.getElementById('newsletterForm').addEventListener('submit', function(event) {
              event.preventDefault();
              let email = document.getElementById('newsletter_email').value;

              fetch('subscribe.php', {
                method: 'POST',
               headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
               body: 'email=' + encodeURIComponent(email)
                  })
          .then(response => response.text())
          .then(data => alert(data))
           .catch(error => console.error('Error:', error));
          });
      </script>

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="produce_new.js"></script>
</body>
</html>
