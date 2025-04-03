<?php include 'header.php'; 
$host = "localhost"; 
$user = "harvestAdminNew";
$password = "urbanharvest";
$database = "urbanharvest";

$conn = new mysqli($host, $user, $password, $database);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql = "INSERT INTO contact (name, email, message) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {
        
        echo "<script>alert('Message sent successfully!');</script>";
    } else {
        echo "<script>alert('Error submitting the form.');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Urban Harvest - Contact Us</title>
</head>
<link rel = "stylesheet" href = "style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://use.typekit.net/sfi7vlm.css">
<body>
 
    <main>

        <div class="contact-container">
            <h2>Contact Us</h2>
            <p>Have questions or need assistance? Reach out to us!</p>
            <div class="row text-center">
                <div class="col-md-4">
                    <img src = "images/location-unscreen.gif" style = "width:40%; height:40%">
                    <p>1234 Victoria Street, Kitchener, ON</p>
                </div>
                <div class="col-md-4">
                    <img src = "images/contact-unscreen.gif" style = "width:40%; height:40%">
                    <p>+1 526 731 3838</p>
                </div>
                <div class="col-md-4">
                    <img src = "images/email-file.gif" style = "width:40%; height:40%">
                    <p><a href="mailto:info@urbanharvest.com">info@urbanharvest.com</a></p>
                </div>
            </div>
            <form class = "contact-form" method="POST" action="contact.php">
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Your Name" name = "name" required>
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" placeholder="Your Email" name = "email" required>
                </div>
                <div class="mb-3">
                    <textarea class="form-control" rows="4" placeholder="Your Message" name = "message" required></textarea>
                </div>
                <button type="submit" class = "btn btn-success btn-lg search-btn">Send Message</button>
            </form>
        </div>

    </main>

    

<!-- <script>
document.addEventListener("DOMContentLoaded", function () {
    const submitButton = document.querySelector(".search-btn"); // Target the button

    if (submitButton) {
        submitButton.addEventListener("click", function (event) {
            event.preventDefault(); // Prevent default form submission for debugging
            alert("Button clicked!");
        });
    } else {
        console.error("Submit button not found!");
    }
});
</script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>