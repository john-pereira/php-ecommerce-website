<?php 

include('connection.php');

// Connecting to the database
$stmt = $conn->prepare("SELECT * FROM products LIMIT 4");

$stmt->execute();

$featured_products = $stmt->get_result();//return a array[]

?>