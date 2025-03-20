<?php
// Include the database connection file
include 'db_connection.php';  

try {
    // Query to get products from the database (table name: products)
    $query = "SELECT * FROM products";  // 
    $stmt = $pdo->query($query);
    
    // Fetch all the products as an associative array
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Convert the products array to JSON format and output it
    echo json_encode($products);

} catch (PDOException $e) {
    // Catch and display any connection or query errors
    echo "Error fetching products: " . $e->getMessage();
}
?>
