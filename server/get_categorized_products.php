<?php 

include('connection.php');

// Connecting to the database
$stmt = $conn->prepare("SELECT * FROM `products` ORDER BY `products`.`product_id` ASC LIMIT 1");

$stmt->execute();

$categorized_products = $stmt->get_result();

?>