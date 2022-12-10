<?php 

// session_start();
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

//if user clicked checkout button and cart isn't empty
if ( !empty($_SESSION['cart']) && isset($_POST['checkout'])){


// if cart empty return to home page
}else{
  header('location: index.php');

}



?>

 <!-- Checkout -->
 <section id="checkout-session" class="my-2 pb-5">
        <div class="container text-center mt-2 py-5">
          <h3>Checkout</h3>
        </div>
        <div class="row mx-auto container-fluid">


          <div class="checkout-container text-center col-lg-3 col-md-4 col-sm-12">

            <form id="checkout-form" method="POST" action="orderSummary.php">
              <div class="form-group checkout-small-element">
                <label for="name" class="text-left">Name</label>
                <input type="text" name="name" id="checkout-name" >
              </div>
              <div class="form-group checkout-small-element">
                <label for="name" class="text-left">Email</label>
                  <input type="email" name="email" id="checkout-email" >
              </div>
              <div class="form-group checkout-small-element">
                <label for="name" class="text-left">Phone</label>
                <input type="text" name="phone" id="checkout-phone" >
              </div>
              <div class="form-group checkout-small-element">
                  <p>Total amount: $ <?php echo $_SESSION['total']; ?></p>
                  <input type="submit" class="btn checkout-btn" value="Place Order" name="place_order">
              </div>
            </form>

          </div>
        
        </div>

  </section>


<div class="container mt-5 mx-auto">
  <div class="col-lg-6 col-md-6 col-sm-12 checkout-container">
    
  </div>
</div>