<?php

  session_start();
$conn = mysqli_connect("localhost","root","","zomato");
  if (isset($_POST['submit'])) {
    
    $orderNumber = rand(13232,8939217);

    $flat = $_POST['flat'];
    $street = $_POST['street'];
    $area = $_POST['area'];
    $landmark = $_POST['landmark'];
    $city = $_POST['city'];

    foreach ($_SESSION['zomato_cart'] as $key => $value) {
    $query = "INSERT INTO `order`(`id`, `order_id`, `user_id`, `item_id`, `amount`,`flat`, `street`, `area`, `landmark`, `city`, `status`) VALUES ('','".$orderNumber."','".$value['userId']."','".$value['item_id']."','".$value['price']."','$flat', '$street', '$area', '$landmark', '$city', 'Not Yet Confirmed')";

      $result = mysqli_query($conn, $query);
    

    }

    
    if ($result) {
      unset($_SESSION['zomato_cart']);
       echo "<script>
        alert('Your order placed successfully. order number is $orderNumber')
        window.location.replace('my_order.php');
    </script>";
    }



   

  }
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
</head>
<body>

   <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="registration.php">Sign up</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Sign in</a>
      </li>

       <li class="nav-item">
        <a class="nav-link" href="cart.php">Cart</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">My Account</a>
      </li>
    </ul>
  </div>
</nav>

<div class="jumbotron text-center">
  <h1>My First Bootstrap Page</h1>
  <p>Resize this responsive page to see the effect!</p> 
</div>
  
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-3">
      <div class="card" style="width: 19rem;">
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

    if (!empty($_SESSION["zomato_cart"])) {
      
    

    $total = 0;
     foreach ($_SESSION['zomato_cart'] as $key => $value) {

      $total = $total+$value['price'];
   
    ?>
    <div class="row">

      <div class="col-sm-3">
        <img src="https://www.archanaskitchen.com/images/archanaskitchen/0-Archanas-Kitchen-Recipes/2019/Pudina_Laccha_Paratha_recipe_17.jpg" width="100%;" style="height: 100px;">
      </div>
      
      <div class="col-sm-6">
        <h5><?php echo $value['item_name']; ?></h5>
        <p><?php echo $value['description']; ?></p>
      </div>


      <div class="col-sm-3">
        <h5>Rs. <?php echo $value['price']; ?></h5>
      </div>     
    </div>
    <br>

    <?php
  }} else {
    ?>
    <p>No Food Added</p>
    <?php

    
  }
  ?>
  </div>
</div>
    </div>
    <?php
     if (!empty($_SESSION["zomato_cart"])) {
    ?>
    <div class="col-sm-3">
      <div class="card" style="width: 18rem;">
  <div class="card-header">
    Your Shopping Cart
  </div>
  <form method="post">  
  <div class="card-body">
    <input type="text" class="form-control" placeholder="Flat or Building Number" name="flat">
    <input type="text" class="form-control" placeholder="Street Name" name="street">
    <input type="text" class="form-control" placeholder="Area" name="area">
    <input type="text" class="form-control" placeholder="Landmark if any" name="landmark">
    <input type="text" class="form-control" placeholder="City" name="city">

  </div>
  <hr>
  <div class="card-body">
    <p style="text-align: center;">Total</p>

    <h2 style="text-align: center;"><?php echo $total; ?></h2>
    <p style="text-align: center;">Free Shipping</p>
    
    <center><button class="btn btn-primary" type="submit" name="submit">Place order</button></center>
    </form>
  </div>
</div>

<?php
  }
?>
    </div>
  </div>
</div>

</body>
</html>
