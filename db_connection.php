<?php
$host = 'localhost';  // Database host 
$dbname = 'urban_harvest';  // database name
$username = 'urbanharvest';  //  MySQL username
$password = 'urbanharvest';  // MySQL password

try {
    // Create new connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";  // debugging
} catch (PDOException $e) {
   // echo "Connection failed: " . $e->getMessage();
}
?>
