<!-- Single Job -->
<section class="container single-product my-5 pt-5">
      <div class="row mt-5">
        
        <?php include('server/get_job_detail.php'); ?>    
        <!-- lopp in the array of jobs -->
        <?php while($row= $job->fetch_assoc()){ ?>

         
          <div class="col-lg-5 col-md-6 col-sm-12">
              <img src="assets/imgs/<?php echo $row['job_image']; ?>" alt="" class="img-fluid w-100 pb-1" id="main-img">
              
          </div>

        

          <div class="col-lg-6 col-md-12 col-sm-12">
              <h3 class="py-4"><?php echo $row['job_name']; ?></h3>
              <h2 class="price"><?php echo $row['job_category']; ?></h2>
              
              <form method="POST" action="">
                <!-- <input type="hidden" name="product_id" value="<?php //echo $row['product_id']; ?>">
                <input type="hidden" name="product_image" value="<?php //echo $row['product_image']; ?>">
                <input type="hidden" name="product_name" value="<?php //echo $row['product_name']; ?>">
                <input type="hidden" name="product_price" value="<?php //echo $row['product_price']; ?>"> -->
                <label for="candidate_name">Name</label>
                <input type="text" name="candidate_name" id="" value=""><br>
                <label for="candidate_email">Email</label>
                <input type="email" name="candidate_email" id="" value=""><br>
                <label for="candidate_resume">Resume</label>
                <input type="file" name="candidate_resume" id="" value=""><br>
                <button type="submit" name="apply_to_job" class="btn btn-success">Apply</button>
              </form>  

               
                <h4 class="mt-5 mb-5">Job Details</h4>
                <span><?php echo $row['job_description']; ?></span>
          </div>

         
        <?php } ?>

      </div>      
</section>