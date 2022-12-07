<?php 

session_start();

// if(!isset($_SESSION)) 
//     { 
//         session_start(); 
//     }
//     else
//     {
//         session_destroy();
//         session_start(); 
//     }

//checking if the user clicked add to cart button or not
if(isset($_POST['add_to_cart'])){
  
  //if user has already add a product to cart (cart is not empty)
  if(isset($_SESSION['cart'])){

    $product_array_ids = array_column($_SESSION['cart'],"product_id");
    // checking if product has already been added to cart or not by trying to find if this product_id exist in the $product_array_ids
    if(!in_array($_POST['product_id'], $product_array_ids)){
      
      //Specifying the product_id
      $product_id = $_POST['product_id'];

        $product_array = array(
                        'product_id' => $_POST['product_id'],
                        'product_name' => $_POST['product_name'],
                        'product_price' => $_POST['product_price'],
                        'product_image' => $_POST['product_image'],
                        'product_quantity' => $_POST['product_quantity'],
                        'product_pickup_date' => $_POST['product_pickup_date'],
                        'product_pickup_time' => $_POST['product_pickup_time']
      );

    // Session will store a array taht the index will be the product id which is another array [ 1=>[], 2=>[], etc ]
    $_SESSION['cart'][$product_id] = $product_array;

    //if product has already been add  
    }else{
      //  echo '<script>alert("Prodcut was already added to the cart")</script>';
      //  echo '<script>window.location="index.php"</script>';
    }


  //if is this the first product(cart is empty)
  }else{
    
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];
    $product_pickup_date = $_POST['product_pickup_date'];
    $product_pickup_time = $_POST['product_pickup_time'];

    $product_array = array(
                     'product_id' => $product_id,
                     'product_name' => $product_name,
                     'product_price' => $product_price,
                     'product_image' => $product_image,
                     'product_quantity' => $product_quantity,
                     'product_pickup_date' => $product_pickup_date,
                     'product_pickup_time' => $product_pickup_time
    );

    // Session will store a array taht the index will be the product id which is another array [ 1=>[], 2=>[], etc ]
    $_SESSION['cart'][$product_id] = $product_array;


  }

  //Calculate total
  calculateTotalCart();


// Remove product to the cart
}else if(isset($_POST['remove_product'])){

  $product_id = $_POST['product_id'];
  unset($_SESSION['cart'][$product_id]);

   //Calculate total
   calculateTotalCart();

//edit a product in the cart  
}else if(isset($_POST['edit_quantity'])){

  // get the id and quantity from the form
  $product_id = $_POST['product_id'];
  $product_quantity = $_POST['product_quantity'];

  //get product array from the session
  $product_array = $_SESSION['cart'][$product_id];

  //udpdate product quantity
  $product_array['product_quantity'] = $product_quantity;

  //return the array to the session
  $_SESSION['cart'][$product_id] = $product_array;

   //Calculate total
   calculateTotalCart();

}else{
  header('location: index.php');
}

//Function to loop in the session and calculate the total cart
function calculateTotalCart(){

  $total = 0;

  foreach($_SESSION['cart'] as $key => $value){

    $product = $_SESSION['cart'][$key];

    $price = $product['product_price'];
    $quantity = $product['product_quantity'];

    $total = $total + ($price * $quantity);

  }

  $_SESSION['total'] = $total;

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
          <th>Quantity</th>
          <th>Pick-Up Date</th>
          <th>Pick-Up Tme</th>
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
                      <!-- Remove Button -->
                      <form method="POST" action="shoppingCart.php">
                        <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>">
                        <input type="submit" name="remove_product" class="remove-btn" value="Remove">
                      </form>
                  </div>
              </div>
          </td>
          <td>
              <!-- Edit Button -->
              <form method="POST" action="shoppingCart.php">
                <input type="hidden" name="product_id" value="<?php echo $value['product_id'];?>" />
                <input type="number" id="product_quantity" name="product_quantity" value="<?php echo $value['product_quantity']; ?>" />
                <input type="submit" name="edit_quantity" value="Edit" class="edit-btn" />
              </form>
            

          </td>
          <td>
              <input type="text" id="product_pickup_date" readonly value="<?php echo $value['product_pickup_date']; ?>" />
              <!-- <a href="" class="edit-btn">Edit</a> -->
          </td>
          <td>
              <input type="text" id="product_pickup_time" readonly value="<?php echo $value['product_pickup_time']; ?>" />
              <!-- <a href="" class="edit-btn">Edit</a> -->
          </td>
          <td>
              <span>$</span>
              <span class="product-price">AUD<?php echo $value['product_quantity'] * $value['product_price']; ?></span>
          </td>
      </tr>

      <?php } ?>

  </table>
  <div class="cart-total">
      <table>
          <!-- <tr>
              <td>Subtotal</td>
              <td>$9.99</td>
          </tr> -->
          <tr>
              <td>Total</td>
              <td>$<?php echo $_SESSION['total']; ?></td>
          </tr>
      </table>
  </div>
  <div class="checkout-container">
    <button class="btn checkout-btn">Checkout</button>
  </div>
</section>
