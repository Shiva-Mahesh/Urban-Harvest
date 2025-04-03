<?php include 'header.php'; 
$host = "localhost"; 
$user = "harvestAdminNew";
$password = "urbanharvest";
$database = "urbanharvest";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}


if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $query = "SELECT first_name, last_name, phone, email, street_address, apt_no, city, province, postal_code FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_data = $result->fetch_assoc();
    $stmt->close();
} else {
    $user_data = [
        'first_name' => '',
        'last_name' => '',
        'phone' => '',
        'email' => '',
        'street_address' => '',
        'apt_no' => '',
        'city' => '',
        'province' => '',
        'postal_code' => '',
    ];
}







?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Urban Harvest - Check Out Page</title>
</head>
<link rel = "stylesheet" href = "style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://use.typekit.net/sfi7vlm.css">
<body>
 

    <main>
    

    <div class = "checkout_container">
        <div class = "row">
            <div class = "col-md-7 delivery_info">
                <!-- <div class="delivery-text">
                    <p> Returning Customer? <a href = "login.html"> Login Here.</a></p>
                </div> -->
                <h2>Delivery Information</h2>
                <form>
                    <div class="mb-3 delivery-cust-name">
                        <input class="form-control" type="text" placeholder="First Name" required value="<?php echo htmlspecialchars($user_data['first_name']); ?>">
                        <input class="form-control" type="text" placeholder="Last Name" required value="<?php echo htmlspecialchars($user_data['last_name']); ?>">
                    </div>

                    <div class="mb-3 delivery-cust-contact">
                        <input class="form-control" type="email" placeholder="Email" required value="<?php echo htmlspecialchars($user_data['email']); ?>">
                        <input class="form-control" type="tel" placeholder="Phone number" required value="<?php echo htmlspecialchars($user_data['phone']); ?>">
                    </div>

                    <div class="mb-3 delivery-cust-address">
                            <label class="form-label">Address</label>
                       
                            <input type="text" class="form-control" placeholder="Street Address" required value="<?php echo htmlspecialchars($user_data['street_address']); ?>"> <br>
                            <div class = "address-1">
                                <input type="text" class="form-control" placeholder="Apt/Suite # (optional)" required value="<?php echo htmlspecialchars($user_data['apt_no']); ?>"> <br>
                                <input type="text" class="form-control" placeholder="City" required value="<?php echo htmlspecialchars($user_data['city']); ?>"> <br>
                            </div> <br>
                         
                            <div class = "address-2">
                          
                                <select id="province" class="form-control" name="province" class="form-select">
                                    <option value="">Select Province</option>
                                    <option value="Alberta" <?php if ($user_data['province'] == "Alberta") echo "selected"; ?>>Alberta</option>
                                    <option value="British Columbia">British Columbia</option>
                                    <option value="Manitoba">Manitoba</option>
                                    <option value="New Brunswick">New Brunswick</option>
                                    <option value="Newfoundland and Labrador">Newfoundland and Labrador</option>
                                    <option value="Northwest Territories">Northwest Territories</option>
                                    <option value="Nova Scotia">Nova Scotia</option>
                                    <option value="Nunavut">Nunavut</option>
                                    <option value="Ontario" <?php if ($user_data['province'] == "Ontario") echo "selected"; ?>>Ontario</option>
                                    <option value="Prince Edward Island">Prince Edward Island</option>
                                </select> <br>
                                <input type="text" class="form-control" placeholder="Zip/Postal Code" required value="<?php echo htmlspecialchars($user_data['postal_code']); ?>"> <br>
                            </div>
                    </div>

                    <div class="mb-3 delivery-time">
                        <label>Preferred Delivery Time:  </label>
                        <select class = "form-control" name="delivery_time" id="delivery_time">
                            <option value="morning">Morning (9 AM - 12 PM)</option>
                            <option value="afternoon">Afternoon (12 PM - 5 PM)</option>
                            <option value="evening">Evening (5 PM - 8 PM)</option>
                        </select>
                    </div>
                </form>
                <div class="delivery-text">
                    <p>By clicking complete order, you agree to the <b style="color:orange">Terms and Conditions</b> for the storage of your data.</p>
                </div>
            </div>

             
            
            <div class="col-md-3 payment_info">
                <h2 style="text-align: center;">Your Order</h2>  
                
                <table class="table table-striped">
                    
                    <tbody>
                        <tr>
                            <td>Subtotal</td>
                            
                            <td id = "subtotal"> </td>
                        </tr>
                        <tr>
                            <td>Reward points</td>
                            
                            <td id="reward_score" style="color:green;"> </td>
                        </tr>
                        <tr>
                            <td>Reward Discount</td>
                            <td id="reward_discount" style="color:green;"> </td>
                        </tr>
                        <tr>
                            <td>Promotional discount</td>
                            
                            <td id="promo_discount" style="color:green;"> </td>
                        </tr>
                        <tr>
                            <td>Taxes</td>
                            
                            <td id="tax"> </td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            
                            <td id="final_total"> </td>
                        </tr>
                        <!-- <tr>
                            <td colspan="2" class="text-right">Total:</td>
                            <td>$7.50</td>
                        </tr> -->
                    </tbody>
                    

                </table>
                
               
                <h4>Credit/Debit Card</h4>
                <div class = "card-pics">
                    <img src="images/card111.png" alt="Visa">
                    <img src="images/card2111.png" alt="MasterCard">
                    <img src="images/card3111.png" alt="American Express">
                    <img src="images/card4111.png" alt="Discover">
                    
                </div>

                <label>Preferred Payment Method</label>
                <select name="payment_method" id="payment_method">
                    <option value="card">Credit/Debit Card</option>
                    <option value="upi">UPI</option>
                    <option value="cod">Cash on Delivery</option>
                </select>


                
                <div id="card-details" class="card-details">
                    <form>

                        <div class="mb-3">
                            <label class="form-label">Card Number</label>
                            <input class="form-control" type="text" placeholder="XXXX XXXX XXXX XXXX" required>
                        </div>

                        <div class="mb-3">
                             <label class="form-label">Expiration Date</label>
                            <input class="form-control" type="text" placeholder="MM/YY" required>
                            <label class="form-label">CVV</label>
                            <input class="form-control" type="text" placeholder="CVV" required>
                        
                        </div>
                    
                    
                        <div class="mb-3">
                            <label class="form-label">Name on Card</label>
                            <input class="form-control" type="text" placeholder="Enter your name on the card" required>
                        </div>
                    
                                      
                        <button class = "btn btn-success btn-lg complete-order">Complete Order</button>

                    </form>
                </div>

            </div>
            <div class="col-md-1">

            </div>
                
                
        </div>

    </div>
        <!-- <div class="checkout-container">
            <h2>Checkout</h2>
            
            <div class="checkout-form">
                <form>
                    <h3>Billing Details</h3>
                    <label>Full Name</label>
                    <input type="text" placeholder="Enter your full name" required>
                    
                    <label>Email</label>
                    <input type="email" placeholder="Enter your email" required>
                    
                    <label>Phone</label>
                    <input type="tel" placeholder="Enter your phone number" required>
                    
                    <label>Shipping Address</label>
                    <input type="text" placeholder="Street Address" required>
                    <input type="text" placeholder="City" required>
                    <input type="text" placeholder="State" required>
                    <input type="text" placeholder="Zip Code" required>
                    
                    <h3>Payment Method</h3>
                    <label>
                        <input type="radio" name="payment" value="card" checked> Credit/Debit Card
                    </label>
                    <label>
                        <input type="radio" name="payment" value="upi"> UPI
                    </label>
                    <label>
                        <input type="radio" name="payment" value="cod"> Cash on Delivery
                    </label>
                    
                    <div id="card-details">
                        <label>Card Number</label>
                        <input type="text" placeholder="XXXX XXXX XXXX XXXX" required>
                        
                        <label>Expiry Date</label>
                        <input type="text" placeholder="MM/YY" required>
                        
                        <label>CVV</label>
                        <input type="text" placeholder="XXX" required>
                    </div>
                    
                    <h3>Apply Promo Code</h3>
                    <input type="text" placeholder="Enter promo code">
                    <button type="button">Apply</button>
                    
                    <button type="submit" class="place-order">Place Order</button>
                </form>
            </div>
            
            <div class="order-summary">
                <h3>Order Summary</h3>
                <p>Items Total: <span>$50.00</span></p>
                <p>Shipping: <span>$5.00</span></p>
                <p>Discount: <span>-$5.00</span></p>
                <h3>Total: <span>$50.00</span></h3>
            </div>
        </div>
     -->

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
    <script src="checkout.js"></script>
</body>
</html>