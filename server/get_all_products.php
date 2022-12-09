<?php 

include('connection.php');

// Connecting to the database
$stmt = $conn->prepare("SELECT * FROM products");

$stmt->execute();

$all_products = $stmt->get_result();//return a array[]

?>