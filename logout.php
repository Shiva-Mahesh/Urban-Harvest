<?php
session_start();
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

session_destroy(); // Destroy session
// echo json_encode(["success" => "Logged out successfully"]);
echo json_encode(["status" => "success", "message" => "Logged out successfully"]);
echo "<script>alert('Logged out successfully!');</script>";

// Redirect to login page
 header("Location: login_user.php");
 
exit();
?>
