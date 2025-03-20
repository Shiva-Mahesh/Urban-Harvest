<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

// Database connection
$host = "localhost"; 
$user = "harvestAdminNew";
$password = "urbanharvest";
$database = "urbanharvest";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

// Get input data
$data = json_decode(file_get_contents("php://input"), true);

if (!$data) {
    die(json_encode(["error" => "Invalid input"]));
}

// Extract fields
$first_name = $conn->real_escape_string($data['first_name']);
$last_name = $conn->real_escape_string($data['last_name']);
$phone = $conn->real_escape_string($data['phone']);
$email = $conn->real_escape_string($data['email']);
$password = password_hash($data['password'], PASSWORD_BCRYPT); // Hash password
$street_address = $conn->real_escape_string($data['street_address']);
$apt_no = $conn->real_escape_string($data['apt_no']);
$city = $conn->real_escape_string($data['city']);
$province = $conn->real_escape_string($data['province']);
$postal_code = $conn->real_escape_string($data['postal_code']);

// Insert into database
$sql = "INSERT INTO users (first_name, last_name, phone, email, password, street_address, apt_no, city, province, postal_code)
        VALUES ('$first_name', '$last_name', '$phone', '$email', '$password', '$street_address', '$apt_no', '$city', '$province', '$postal_code')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["success" => "User registered successfully"]);
} else {
    echo json_encode(["error" => "Error: " . $conn->error]);
}

$conn->close();
?>
