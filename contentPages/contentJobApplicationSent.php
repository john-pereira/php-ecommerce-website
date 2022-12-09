<?php 
include('server/connection.php');


$sql = ("SELECT * FROM `jobs_applications` ORDER BY `jobs_applications`.`application_id` DESC LIMIT 1");

$query=mysqli_query($conn,$sql);



?>


<div class="container">
    <div class="alert alert-info col-12 col-md-5 mx-auto my-3 border-info text-center" role="alert">
        <?php while($row=mysqli_fetch_array($query)){ ?>
        <p>Application sent. Good luck!</p>
        <p>Please refer to the reference number below to follow up.</p>
        <p>Reference number:</p><?php echo $row['application_id']; ?>
        <strong><p class="referenceNumber"></p></strong>
        <?php } ?>
    </div>
</div>