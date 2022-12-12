<div class="container-fluid">

    <?php include('server/get_classes.php'); ?>

    <?php while($row= $bread_making_classes->fetch_assoc()){ ?>

  <div class="row breadMakingClassPromo">
  </div><!-- <div class="row"> -->
      <div class="classes text-center col-lg-12 col-md-4 col-sm-12">
        <h4 class="p-name my-5">Class: <?php echo $row['class_name']; ?></h4>  
        <img src="assets/imgs/<?php echo $row['class_image']; ?>" alt="" class="img-fluid mb-3">
        <!-- <h5 class="p-price"><?php echo $row['class_category']; ?></h5> -->
        <h4>Description:</h4> <p><?php echo $row['class_description']; ?></p>
      </div>
  
  <div class="row breadMakingClassVideo mx-auto">
    <div class="w-100 h-100 embed-responsive embed-responsive-16by9">
      <iframe class="w-100 h-100 embed-responsive-item" src="https://www.youtube.com/embed/h6XVAUZJ3QI" allowfullscreen></iframe>
    </div>
        
    
    <?php } ?>
  </div><!-- <div class="row"> -->
</div><!-- <div class="container-fluid"> -->
