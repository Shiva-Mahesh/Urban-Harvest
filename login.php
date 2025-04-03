<?php
session_start(); // Start session
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
error_reporting(E_ALL);
ini_set('display_errors', 1);


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
// if (!$data) {
//     die(json_encode(["error" => "Invalid input"]));
// }

// $email = $conn->real_escape_string($data['email']);
// $password = $data['password'];

// $sql = "SELECT id, first_name, last_name, email, password FROM users WHERE email = '$email'";
// $result = $conn->query($sql);
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $username = $_POST['email'];
//     $password = $_POST['password']; // User entered password

    if (isset($data['username']) && isset($data['password'])) {
        $username = trim($data['username']);
        $password = trim($data['password']);

    // Fetch stored hashed password from the database
    $stmt = $conn->prepare("SELECT first_name, email, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($fname, $userId, $hashedPassword);
        $stmt->fetch();

        // Verify password
        if (password_verify($password, $hashedPassword)) {
            // Password is correct, start session
            $_SESSION['user_id'] = $userId;
            $_SESSION['username'] = $username;

            $_SESSION['fname'] = $fname;
            echo json_encode(["status" => "success", "message" => "Login successful"]);
            // echo "Login successful";
        } else {
            echo json_encode(["status" => "error", "message" => "Invalid credentials"]);
            // echo "Invalid credentials";
        }
        $stmt->close();
    } else {
        echo json_encode(["status" => "error", "message" => "Missing username or password"]);
        // echo "User not found";
    }
}
// if ($result->num_rows === 1) {
//     $user = $result->fetch_assoc();

//     if (password_verify($password, $user['password'])) {
//         // Store user info in session
//         $_SESSION["user_id"] = $user['id'];
//         $_SESSION["email"] = $user['email'];
//         $_SESSION["first_name"] = $user['first_name'];

//         echo json_encode([
//             "success" => "Login successful",
//             "user" => [
//                 "id" => $user['id'],
//                 "first_name" => $user['first_name'],
//                 "email" => $user['email']
//             ]
//         ]);
//     } else {
//         echo json_encode(["error" => "Incorrect password"]);
//     }
// } else {
//     echo json_encode(["error" => "User not found"]);
// }

$conn->close();
?>




