<?php
// Enable error reporting to help debug
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Include the database connection
include('db_connection.php');

// SQL query to get the promotions from the database
$sql = "SELECT * FROM promotions"; 
$stmt = $pdo->prepare($sql);
$stmt->execute();

// Fetch the promotions data from the database
$promotions = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Set the content type to JSON
header('Content-Type: application/json');

// Return the data as JSON
echo json_encode($promotions);

// Ensure no other content is output
exit();
?>
