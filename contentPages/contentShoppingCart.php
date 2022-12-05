<?php 

session_start();

//checking if the user clicl add to cart button or not
if(isset($_POST['add_to_cart'])){
  
  //if user has already add a product to cart (cart is not empty)
  if(isset($_SESSION['cart'])){

    $product_array_ids = array_column($_SESSION['cart'],"product_id");
    // checking if product has already been added to cart or not by trying to find if this product_id exist in the $product_array_ids
    if(!in_array($_POST['product_id'], $product_array_ids)){
   
      $product_array = array(
                      'product_id' => $_POST['product_id'],
                      'product_name' => $_POST['product_name'],
                      'product_price' => $_POST['product_price'],
                      'product_image' => $_POST['product_image'],
                      'product_quantity' => $_POST['product_quantity']
      );

    // Session will store a array taht the index will be the product id which is another array [ 1=>[], 2=>[], etc ]
    $_SESSION['cart'][$product_id] = $product_array;

    //if product has already been add  
    }else{
       echo '<script>alert("Prodcut was already added to the cart")</script>';
      //  echo '<script>window.location="index.php"</script>';
    }


  //if is this the first product(cart is empty)
  }else{
    
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];

    $product_array = array(
                     'product_id' => $product_id,
                     'product_name' => $product_name,
                     'product_price' => $product_price,
                     'product_image' => $product_image,
                     'product_quantity' => $product_quantity,
    );

    // Session will store a array taht the index will be the product id which is another array [ 1=>[], 2=>[], etc ]
    $_SESSION['cart'][$product_id] = $product_array;


  }

}else{
  header('location: index.php');
}



?>
<!-- Cart  -->
<section class="cart container my-5 py-5">
  <div class="container mt-5">
      <h2 class="font-wieight-bold">Your Cart</h2>
      <hr>
  </div>

  <table class="mt-5 pt-5">
      <tr>
          <th>Product</th>
          <th>Qunatity</th>
          <th>Subtotal</th>
      </tr>

      <?php foreach($_SESSION['cart'] as $key => $value){ ?>

      <tr>
          <td>
              <div class="product-info">
                  <img src="assets/imgs/<?php echo $value['product_image']; ?>" alt="" class="img-fluid">
                  <div>
                      <p><?php echo $value['product_name']; ?></p>
                      <small><span>$</span>AUD<?php echo $value['product_price']; ?></small>
                      <br>
                      <a href="" class="remove-btn">Remove</a>
                  </div>
              </div>
          </td>
          <td>
              <input type="number" value="<?php echo $value['product_quantity']; ?>" />
              <a href="" class="edit-btn">Edit</a>

          </td>
          <td>
              <span>$</span>
              <span class="product-price">AUD<?php echo $value['product_price']; ?></span>
          </td>
      </tr>

      <?php } ?>

  </table>
  <div class="cart-total">
      <table>
          <tr>
              <td>Subtotal</td>
              <td>$9.99</td>
          </tr>
          <tr>
              <td>Total</td>
              <td>$9.99</td>
          </tr>
      </table>
  </div>
  <div class="checkout-container">
    <button class="btn checkout-btn">Checkout</button>
  </div>
</section>
