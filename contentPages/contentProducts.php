 <!-- All Products -->
 <section id="featured" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
          <h3>Products</h3>
          <hr class="mx-auto">
          <p>Here you can check out our products</p>
        </div>
        <div class="row mx-auto container-fluid">

        <!-- Including get_feature_products.php file -->
        <?php include('server/get_all_products.php'); ?>

        <?php while($row= $all_products->fetch_assoc()){ ?>

          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
          <a href="productDetails.php?product_id=<?php echo $row['product_id']; ?>">
            <img src="assets/imgs/<?php echo $row['product_image']; ?>" alt="" class="img-fluid mb-3">
          </a>  
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
            <h4 class="p-price">$<?php echo $row['product_price']; ?></h4>
            <a href="productDetails.php?product_id=<?php echo $row['product_id']; ?>"><button class="buy-btn btn">Buy Now</button></a>
          </div>
          
          <?php } ?>
        </div>

  </section>