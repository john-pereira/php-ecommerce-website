<?php 

include('connection.php');

// Connecting to the database
$stmt = $conn->prepare("SELECT * FROM jobs LIMIT 4");

$stmt->execute();

$available_jobs = $stmt->get_result();//return a array[]

?>