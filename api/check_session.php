<?php
session_start();
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

if (isset($_SESSION["user_id"])) {
    echo json_encode([
        "success" => "User is logged in",
        "user" => [
            "id" => $_SESSION["user_id"],
            "email" => $_SESSION["email"],
            "first_name" => $_SESSION["first_name"]
        ]
    ]);
} else {
    echo json_encode(["error" => "User not logged in"]);
}
?>
