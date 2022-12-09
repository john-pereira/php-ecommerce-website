<div class="container">
    <div class="alert alert-info col-12 col-md-5 mx-auto my-3 border-info text-center" role="alert">
        <?php include('../Processes/processApplyJob.php'); ?>   
        <p>Application sent. Good luck!</p>
        <p>Please refer to the reference number below to follow up.</p>
        <?php echo "Application ID: ".$firstName.", ".$lastName.", ".$email.", ".$phone; ?>
        <p>Reference number:</p>
        <strong><p class="referenceNumber"></p></strong>
    </div>
</div>