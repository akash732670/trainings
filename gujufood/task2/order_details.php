<?php

  session_start();
$conn = mysqli_connect("localhost","root","","zomato");
  /*if (isset($_POST['submit'])) {
    
    $orderNumber = rand(13232,8939217);

    $flat = $_POST['flat'];
    $street = $_POST['street'];
    $area = $_POST['area'];
    $landmark = $_POST['landmark'];
    $city = $_POST['city'];

    foreach ($_SESSION['zomato_cart'] as $key => $value) {
    $query = "INSERT INTO `order`(`id`, `order_id`, `user_id`, `item_id`, `amount`,`flat`, `street`, `area`, `landmark`, `city`, `status`) VALUES ('','".$orderNumber."','".$value['userId']."','".$value['item_id']."','".$value['price']."','$flat', '$street', '$area', '$landmark', '$city', 'Not Yet Conirmed')";

      $result = mysqli_query($conn, $query);
    

    }

    
    if ($result) {
       echo "<script>
        alert('Your order placed successfully. order number is $orderNumber')
        window.location.replace('my_order.php');
    </script>";
    }



   

  }*/
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

<script type="text/javascript">     
    function PrintDiv() {    
      window.open( 
              "https://www.geeksforgeeks.org", "_blank");	
            }
 </script>
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
<i class='fas fa-utensils' style="margin-left: 100px;"></i>
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
    <div class="col-sm-6">
      <div class="card">
  <div class="card-header">
    <b>Your ORDERS Delicious hot food!</b>
  </div>
  <div class="card-body">
    <?php
    
    $sql = "SELECT fm.item_name,fm.description,fm.image,fm.quantity,fm.price FROM `order` AS o LEFT JOIN food_menu AS fm ON fm.id = o.item_id WHERE o.order_id = '".$_GET['order_id']."'";

    $resultSql = mysqli_query($conn, $sql);
    $total = 0;
    while ($responsive = mysqli_fetch_assoc($resultSql)) {
    $total = $total+$responsive['price'];
        ?>
    <div class="row">

      <div class="col-sm-3">
        <img src="https://www.archanaskitchen.com/images/archanaskitchen/0-Archanas-Kitchen-Recipes/2019/Pudina_Laccha_Paratha_recipe_17.jpg" width="100%;" style="height: 100px;">
      </div>
      
      <div class="col-sm-6">
        <h5><?php echo $responsive['item_name']; ?></h5>
        <p><?php echo $responsive['description']; ?></p>
      </div>


      <div class="col-sm-3">
        <h5>Rs. <?php echo $responsive['price']; ?></h5>
      </div>     
    </div>
    <br>

    <?php
  }
    ?>
  </div>
</div>
    </div>
    <div class="col-sm-3">
    	<?php
    	$query = "SELECT order_id, flat,street,area,landmark,city, SUM(amount) AS totalAmount, status, created_at FROM `order` WHERE order_id = '".$_GET['order_id']."'";

    	$result = mysqli_query($conn, $query);

    	$getDetails = mysqli_fetch_object($result);
    ?>
      <div class="card">
  <div class="card-header">
    <b>Order # <?php echo $getDetails->order_id; ?> Details</b>
  </div>
  <form method="post">  
  <div class="card-body">
   <!--  <input type="text" class="form-control" placeholder="Flat or Building Number" name="flat">
    <input type="text" class="form-control" placeholder="Street Name" name="street">
    <input type="text" class="form-control" placeholder="Area" name="area">
    <input type="text" class="form-control" placeholder="Landmark if any" name="landmark">
    <input type="text" class="form-control" placeholder="City" name="city"> -->
    <p><b>Order Date:</b>  <?php echo $getDetails->created_at; ?></p>
    <hr>

    <p><b>Flat No / Building No: </b> <?php echo $getDetails->flat; ?></p>
    <p><b>Street Name: </b> <?php echo $getDetails->street; ?></p>
    <p><b>Area: </b> <?php echo $getDetails->area; ?></p>
    <p><b>Landmark: </b> <?php  if ($getDetails->landmark != '') {
    		echo $getDetails->landmark;
    } else {
    	echo "NA";
    } ?></p>
    <p><b>City: </b> <?php echo $getDetails->city; ?></p>

  </div>
  <hr>
  <div class="card-body">
  	<center><button class="btn btn-primary" type="button" onclick="window.open('invoice.php?oid=<?php echo $getDetails->order_id; ?>', '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');">Invoice</button></center>


  	<br>
  	<center><a href="" style="color: red; text-decoration: none;" onclick="window.open('cancelorder.php?oid=<?php echo $getDetails->order_id; ?>', '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');">Cancel this order</a></center>
    <p style="text-align: center; font-size: 20px; color: gray">TOTAL</p>

    <h2 style="text-align: center;"><?php echo $total; ?></h2>

    <?php
      if ($getDetails->status == 'Not Yet Confirmed') {
        ?>

    <p style="text-align: center;"><?php echo $getDetails->status; ?></p>
        <?php
      } else {
        ?>
        <center><button class="btn btn-danger" type="button" onclick="window.open('trackorder.php?oid=<?php echo $getDetails->order_id; ?>', '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');"><?php echo $getDetails->status; ?></button></center>
        <?php
      }
    ?>
    
    
    </form>
  </div>
</div>
    </div>
  </div>
</div>

</body>
</html>
