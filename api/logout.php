<?php
session_start();
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

session_destroy(); // Destroy session
echo json_encode(["success" => "Logged out successfully"]);
?>
