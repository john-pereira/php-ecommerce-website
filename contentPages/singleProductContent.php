<?php 

include('<server/connection.php');

if(isset($_GET['product_id'])){
  $product_id = $_GET['product_id'];

    // Connecting to the database
    $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
    $stmt->bind_param("i", $product_id);

    $stmt->execute();

    $product = $stmt->get_result();//return a array[1] one single element

}else{
  header('location: index.php');
}


?>



<!-- Single Product -->
<section class="container single-product my-5 pt-5">
      <div class="row mt-5">

        <!-- lopp in the array of product -->
        <?php while($row= $product->fetch_assoc()){ ?>

         
          <div class="col-lg-5 col-md-6 col-sm-12">
              <img src="assets/imgs/<?php echo $row['product_image']; ?>" alt="" class="img-fluid w-100 pb-1" id="main-img">
              <div class="small-img-group">
                  <div class="small-img-col">
                      <img src="assets/imgs/<?php echo $row['product_image']; ?>" alt="" width="100%" class="small-img">
                  </div>
                  <div class="small-img-col">
                      <img src="assets/imgs/<?php echo $row['product_image2']; ?>" alt="" width="100%" class="small-img">
                  </div>
                  <div class="small-img-col">
                      <img src="assets/imgs/<?php echo $row['product_image3']; ?>" alt="" width="100%" class="small-img">
                  </div>
                  <div class="small-img-col">
                      <img src="assets/imgs/<?php echo $row['product_image4']; ?>" alt="" width="100%" class="small-img">
                  </div>
              </div>
          </div>

        

          <div class="col-lg-6 col-md-12 col-sm-12">
              <h3 class="py-4"><?php echo $row['product_name']; ?></h3>
              <h2 class="price">$AUD<?php echo $row['product_price']; ?></h2>
              
              <form method="POST" action="shoppingCart.php">
                <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                <input type="hidden" name="product_image" value="<?php echo $row['product_image']; ?>">
                <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>">
                <input type="hidden" name="product_price" value="<?php echo $row['product_price']; ?>">
                <label for="product_quantity">Quantity</label>
                <input type="number" name="product_quantity" id="" value="1"><br>
                <label for="product_pickup_date">Pickup Date</label>
                <input type="date" name="product_pickup_date" id="product_pickup_date" value="" required><br>
                <label for="product_pickup_date">Pickup Time</label>
                <input type="time" name="product_pickup_time" id="product_pickup_time" min="07:00" max="16:00" value="07:00" required><br>
                <button type="submit" name="add_to_cart" class="btn buy-btn">Add to cart</button>
              </form>  

               
                <h4 class="mt-5 mb-5">Product Details</h4>
                <span><?php echo $row['product_description']; ?></span>
          </div>

         
        <?php } ?>

      </div>      
</section>

<!-- Related Products -->
<section id="featured" class="my-5 pb-5">
<div class="container text-center mt-5 py-5">
  <h3>Related Products</h3>
  <hr class="mx-auto">
  <p>Here you can check out our products</p>
</div>
<div class="row mx-auto container-fluid">
  <div class="product text-center col-lg-3 col-md-4 col-sm-12">
    <img src="assets/imgs/croassant-01.png" alt="" class="img-fluid mb-3">
    <div class="star">
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
    </div>
    <h5 class="p-name">Baked Croassant</h5>
    <h4 class="p-price">$14.99</h4>
    <button class="buy-btn btn btn-danger">Buy Now</button>
  </div>
  <div class="product text-center col-lg-3 col-md-4 col-sm-12">
    <img src="assets/imgs/banner-03.png" alt="" class="img-fluid mb-3">
    <div class="star">
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
    </div>
    <h5 class="p-name">Cookies Basket</h5>
    <h4 class="p-price">$24.99</h4>
    <button class="buy-btn btn btn-danger">Buy Now</button>
  </div>
  <div class="product text-center col-lg-3 col-md-4 col-sm-12">
    <img src="assets/imgs/cupcake-01.png" alt="" class="img-fluid mb-3">
    <div class="star">
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
    </div>
    <h5 class="p-name">Cup Cake</h5>
    <h4 class="p-price">$9.99</h4>
    <button class="buy-btn btn btn-danger">Buy Now</button>
  </div>
  <div class="product text-center col-lg-3 col-md-4 col-sm-12">
    <img src="assets/imgs/banner-05.jpg" alt="" class="img-fluid mb-3">
    <div class="star">
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
    </div>
    <h5 class="p-name">Baked Bread</h5>
    <h4 class="p-price">$4.99</h4>
    <button class="buy-btn btn btn-danger">Buy Now</button>
  </div>
</div>
</section>

<script>
  
    var mainImg = document.getElementById("main-img");
    var smallImg = document.getElementsByClassName("small-img");

    for(let i=0; i<4; i++){
        smallImg[i].onclick = function() {
        mainImg.src = smallImg[i].src;
        
    }
    }

</script>