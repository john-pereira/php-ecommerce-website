<?php 

include('<server/connection.php');

if(isset($_GET['job_id'])){
  $job_id = $_GET['job_id'];

    // Connecting to the database
    $stmt = $conn->prepare("SELECT * FROM jobs WHERE job_id = ?");
    $stmt->bind_param("i", $job_id);

    $stmt->execute();

    $job = $stmt->get_result();//return a array[1] one single element

}else{
  header('location: careers.php');
}


?>
