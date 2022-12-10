<?php 

if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 


include('<server/connection.php');

if(isset($_POST['place_order'])){


  //get user info and store it in db
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $order_cost = $_SESSION['total'];
  $order_status = "on_hold";
  $user_id = 1;
  $order_date = date('Y-m-d H:i:s');


  $stmt = $conn->prepare("INSERT INTO orders (order_cost, order_status, user_id, user_name, order_date)
                 VALUES (?, ?, ?, ?, ?); ");

$stmt->bind_param('isiis',$order_cost,$order_status, $user_id, $name, $order_date);

$stmt->execute();

$order_id = $stmt->insert_id;




  //get products from cart 
  foreach($_SESSION['cart'] as $key => $value){

    $product = $_SESSION['cart'][$key];
    $product_id = $product['product_id'];
    $product_name = $product['product_name'];
    $product_price = $product['product_price'];
    $product_image = $product['product_image'];
    $product_quantity = $product['product_quantity'];
    $product_pickup_date = $product['product_pickup_date'];
    $product_pickup_time = $product['product_pickup_time'];

    $stmt1 = $conn->prepare("INSERT INTO order_items (order_id, product_id, product_name, product_image, product_price, product_quantity, product_pickup_date, product_pickup_time, user_id, order_date)
                          VALUES (?,?,?,?,?,?,?,?,?,?)");
                   
    $stmt1->bind_param('iissiissis', $order_id,$product_id,$product_name, $product_image, $product_price, $product_quantity, $product_pickup_date, $product_pickup_time, $user_id, $order_date);                   

    $stmt1->execute();

  }

  

}



?>

<div class="container">
    <h3 class="text-center">Order Summary</h3>
    <p><strong>Order number: </strong><span id="orderNumber"><?php echo $order_id; ?></span></p>
    <p><strong>Customer name: </strong><span id="customerName"><?php echo $name; ?></span></p>
    <p><strong>Order date and time: </strong><span id="orderDateAndTime"><?php echo $order_date; ?></span></p>
    
    <table class="table mx-auto">
      <thead>
        <tr>
          <th scope="col">Item <p class="text-records"><?php echo $product_name; ?></p></th>
          <!-- <th scope="col">Unit Price</th> -->
          <th scope="col">Quantity Ordered: <p class="text-records"><?php echo $product_quantity; ?></p></th>
          <th scope="col">Total: <p class="text-records"><?php echo $order_cost; ?></p></th>
          <th scope="col">Pick-up date: <p class="text-records"><?php echo $product_pickup_date; ?></p></th>
          <th scope="col">Pick-up time: <p class="text-records"><?php echo $product_pickup_time; ?></p></th>
        </tr>
      </thead>
      <tbody>
        <!-- INSERT RECORDS HERE -->
        <tr class="grandTotalRow">
          <th scope="col" colspan="3">Grand Total: $AUD <span class="text-records"><?php echo $order_cost; ?></span></th>
          <th scope="col" colspan="3" id="grandTotal"></th>
        </tr>
      </tbody>
    </table>
</div><!-- <div class="container"> -->