<?php 

include('connection.php');

// Connecting to the database
$stmt = $conn->prepare("SELECT * FROM products WHERE product_category='categorized_product' LIMIT 4");

$stmt->execute();

$categorized_products = $stmt->get_result();

?>