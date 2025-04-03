<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Urban Harvest - New User Registration</title>
</head>
<link rel = "stylesheet" href = "style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://use.typekit.net/sfi7vlm.css">
<body>
 
    <main>
        <div class="container">
            <div class="registration-container">
                <h2>Register to Urban Harvest</h2>
                <form action="new_register.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-control" placeholder="Enter first name" name="first_name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Last Name</label>
                        <input type="text" class="form-control" placeholder="Enter last name" name="last_name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" placeholder="Enter phone number" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email(this will be your username)</label>
                        <input type="email" class="form-control" placeholder="Enter email" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" placeholder="Enter password" name="pwd" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" placeholder="Confirm password" name="confirm_pwd" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <!-- <textarea class="form-control" rows="3" placeholder="Enter your address" required></textarea> -->
                         <input type="text" class="form-control" placeholder="Street Address" name="street_address" required> <br>
                         <div class = "address-1">
                         <input type="text" class="form-control" placeholder="Apt/Suite # " name="apt_no" required> <br>
                         <input type="text" class="form-control" placeholder="City" name="city" required> <br>
                        </div> <br>
                         <!-- <input type="text" class="form-control" placeholder="State" required> <br> -->
                         <div class = "address-2">
                          <label for="province" class="form-label">Province</label>
                          <select id="province" name="province" class="form-select">
                            <option value="">Select Province</option>
                            <option value="Alberta">Alberta</option>
                            <option value="British Columbia">British Columbia</option>
                            <option value="Manitoba">Manitoba</option>
                            <option value="New Brunswick">New Brunswick</option>
                            <option value="Newfoundland and Labrador">Newfoundland and Labrador</option>
                            <option value="Northwest Territories">Northwest Territories</option>
                            <option value="Nova Scotia">Nova Scotia</option>
                            <option value="Nunavut">Nunavut</option>
                            <option value="Ontario">Ontario</option>
                            <option value="Prince Edward Island">Prince Edward Island</option>
                          </select> <br>
                         <input type="text" class="form-control" placeholder="Zip/Postal Code" name="postal_code" required> <br>
                         </div>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="terms" required>
                        <label class="form-check-label" for="terms">I agree to the Terms and Conditions</label>
                    </div>
                    <div class="form-buttons">
                    <button type="submit" class = "btn btn-success btn-lg"> Register</button>
                    <button type = "button" class = "btn btn-success btn-lg" onclick="clearForm()">Clear Form</button>
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
    <script src="new_user.js"></script>
    
</body>
</html>