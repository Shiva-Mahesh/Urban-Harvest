<?php
$host = "localhost"; 
$user = "harvestAdminNew";
$password = "urbanharvest";
$database = "urbanharvest";
$conn = new mysqli($host, $user, $password, $database);
// $conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $email = $conn->real_escape_string($_POST['email']);

    // Check if email exists
    $checkQuery = "SELECT * FROM newsletter_subscribers WHERE email = '$email'";
    $result = $conn->query($checkQuery);

    if ($result->num_rows > 0) {
        echo "You have already signed up!";
    } else {
        $insertQuery = "INSERT INTO newsletter_subscribers (email) VALUES ('$email')";
        if ($conn->query($insertQuery) === TRUE) {
            echo "Subscription successful!";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
$conn->close();
?>
