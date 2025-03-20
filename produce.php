<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

$host = "localhost"; 
$user = "harvestAdminNew";
$password = "urbanharvest";
$database = "urbanharvest";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

$category = isset($_GET['category']) ? $conn->real_escape_string($_GET['category']) : "All";

$sql = "SELECT produce_name, produce_farm, produce_price, produce_quantity, produce_carbonCredit, produce_image, produce_category FROM produce";
if ($category !== "All") {
    $sql .= " WHERE produce_category = '$category'";
}

$result = $conn->query($sql);

$produce = [];
while ($row = $result->fetch_assoc()) {
    $produce[] = $row;
}

// echo json_encode(["produce" => $produce]);
echo json_encode($produce);

$conn->close();
?>
