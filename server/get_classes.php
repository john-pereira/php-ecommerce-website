<?php 

include('connection.php');

// Connecting to the database
$stmt = $conn->prepare("SELECT * FROM classes");

$stmt->execute();

$bread_making_classes = $stmt->get_result();//return a array[]

?>