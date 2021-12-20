<?php

  session_start();
$conn = mysqli_connect("localhost","root","","zomato");
  $query = "SELECT * FROM `order` WHERE user_id=13  GROUP BY order_id";

  $result = mysqli_query($conn, $query);

  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="jumbotron text-center">
  <h1>My First Bootstrap Page</h1>
  <p>Resize this responsive page to see the effect!</p> 
</div>
  
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-3">
      <div class="card">
  <div class="card-header" style="background-color: red; color: white">
    Food Categories 
<i class='fas fa-utensils' style="margin-left: 260px;"></i>
  </div>
  <ul class="list-group list-group-flush">
 <?php

$queryCat = "SELECT * FROM `food_category`";

$resultCat = mysqli_query($conn, $queryCat);

while ($responseCategory = mysqli_fetch_object($resultCat)) {
 ?>
<li class="list-group-item" style="text-align: center;background-color: #f7f2f5;"><?php echo $responseCategory->cat_name; ?></li>
 <?php
}

 ?>
  </ul>
</div>
    </div>
    <div class="col-sm-9">

      <?php
        while ($object = mysqli_fetch_object($result)) {
         
      ?>
    	<div class="row">

    		<div class="col-sm-2">
    			<img src="https://i.vimeocdn.com/portrait/6462071_300x300" style="width: 100%; height: 100%;">
    		</div>


    		<div class="col-sm-7">
    			<h5>Order # <?php echo $object->order_id; ?></h5>
    			<h6>Order Date <?php echo $object->created_at; ?></h6>
    			<p><i class="fa fa-check" aria-hidden="true"></i>
<?php echo $object->status; ?> 
<i class="fa fa-motorcycle" style="font-size:24px"></i> <a href="" style="text-decoration: none;" onclick="window.open('trackorder.php?oid=<?php echo $object->order_id; ?>', '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');"><span style="color: red;">Track Order</span></a>  </p>
    		</div>

    		<div class="col-sm-3">
    			<button class="button btn-basic" style="padding: 5px 10px; border: dotted; border-color: red; color: red;"><a href="order_details.php?order_id=<?php  echo $object->order_id; ?>" style="color: red; text-decoration: none;">View Details</a> </button>
    		</div>
    		
    	</div>
      <br>
      <?php
    }
      ?>
    </div>
    </div>
  </div>
</div>

</body>
</html>
