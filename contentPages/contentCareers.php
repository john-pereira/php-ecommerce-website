<section id="career">
    <div class="container text-center mt-0 py-2">
          <h3>Careers</h3>
          <hr class="mx-auto">
          <p>Here you can check out our available jobs</p>
        </div>
        <div class="row mx-auto container-fluid">

          <!-- Including get_feature_products.php file -->
          <?php include('server/get_jobs.php'); ?>

          <?php while($row= $available_jobs->fetch_assoc()){ ?>

            <div class="jobs text-center col-lg-6 col-md-4 col-sm-12">
                
            <!-- <a href="productDetails.php?product_id=<?php //echo $row['product_id']; ?>"> -->
              <img src="assets/imgs/<?php echo $row['job_image']; ?>" alt="" class="img-fluid mb-3">
            </a>  
              <h4 class="p-name"><?php echo $row['job_name']; ?></h4>
              <h5 class="p-price"><?php echo $row['job_category']; ?></h5>
              <p><?php echo $row['job_description']; ?></p>
              <a href="jobDetails.php?job_id=<?php echo $row['job_id']; ?>">
                <button class="btn btn-success">Apply Now</button>
              </a>  
              <!-- <a href="productDetails.php?product_id=<?php //echo $row['product_id']; ?>"><button class="buy-btn btn">Buy Now</button></a> -->
            </div>
            
            <?php } ?>
    </div>
</section>
<!-- <div class="container"> -->