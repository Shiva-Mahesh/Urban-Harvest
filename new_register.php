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

// Check if request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Extract form data using $_POST
    $first_name = $conn->real_escape_string($_POST['first_name']);
    $last_name = $conn->real_escape_string($_POST['last_name']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $email = $conn->real_escape_string($_POST['username']);
    $password = password_hash($_POST['pwd'], PASSWORD_BCRYPT); // Hash password
    $street_address = $conn->real_escape_string($_POST['street_address']);
    $apt_no = $conn->real_escape_string($_POST['apt_no']);
    $city = $conn->real_escape_string($_POST['city']);
    $province = $conn->real_escape_string($_POST['province']);
    $postal_code = $conn->real_escape_string($_POST['postal_code']);

    // Validation
    if (empty($first_name) || empty($last_name) || empty($phone) || empty($email) || empty($_POST['pwd'])) {
        echo json_encode(["error" => "Please fill in all required fields"]);
        exit;
    }

    // Check if email already exists
    $check_email = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $check_email->bind_param('s', $email);
    $check_email->execute();
    $check_email->store_result();

    if ($check_email->num_rows > 0) {
        echo json_encode(["error" => "Email already exists"]);
        exit;
    }
    $check_email->close();

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, phone, email, password, street_address, apt_no, city, province, postal_code) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssss", $first_name, $last_name, $phone, $email, $password, $street_address, $apt_no, $city, $province, $postal_code);

    if ($stmt->execute()) {
        // echo json_encode(["success" => "User registered successfully"]);
        $_SESSION['user'] = [
            'name' => $first_name . ' ' . $last_name,
            'email' => $email
        ];
        header("Location:success.html");
        exit();
    } else {
        echo json_encode(["error" => "Error: " . $stmt->error]);
    }

    $stmt->close();
} else {
    echo json_encode(["error" => "Invalid request"]);
}

$conn->close();
?>
