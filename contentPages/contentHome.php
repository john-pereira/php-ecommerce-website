  <!-- Home Banner-->
  <section id="home">
        <div class="container">
          <div class="banner-text">
            <h5>Fresh Baked Breads</h5>
            <h1><span>Best Prices </span> Best Quality</h1>
            <p>Our fresh baked breads are make with much love and passion</p>
            <a href="products.php"><button class="btn buy-btn">Shop Now</button></a>
          </div>
          
        </div>
  </section>

  
  <!-- Featured Products Top -->
  <section id="featured" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
          <h3>Featured Products</h3>
          <hr class="mx-auto">
          <p>Here you can check out our products</p>
        </div>
        <div class="row mx-auto container-fluid">

        <!-- Including get_feature_products.php file -->
        <?php include('server/get_featured_products.php'); ?>

        <?php while($row= $featured_products->fetch_assoc()){ ?>

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


  <!-- Banner Botton-->
  <sevtion id="banner">
    <div class="container">
      <h1>Prime Quality</h1>
      <h4>From our oven to your table</h4>
      <a href="products.php"><button class="btn buy-btn">Shop Now</button></a>
    </div>
  </sevtion>
        
<!-- Produtcs Categories -->
<section id="featured" class="my-5">
  <div class="container text-center mt-5 py-5">
    <h3>Best Seller</h3>
    <hr class="mx-auto">
    <p>Meet our best seller</p>
  </div>
  <div class="row mx-auto container-fluid">

  <!-- Including get_categorized_products.php file -->
  <?php include('server/get_categorized_products.php'); ?>

  <?php while($row= $categorized_products->fetch_assoc()){ ?>
    
    <div class="product text-center col-lg-12 col-md-4 col-sm-12">
      <img src="assets/imgs/<?php echo $row['product_image']; ?>" alt="" class="img-fluid mb-3">
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