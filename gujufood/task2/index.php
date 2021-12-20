<?php
session_start();/*
session_unset();*/
$conn = mysqli_connect("localhost","root","","zomato");

$userId = 13;

if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 6;
        $offset = ($pageno-1) * $no_of_records_per_page;


        $total_pages_sql = "SELECT COUNT(*) FROM food_menu";
        $result = mysqli_query($conn,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);


if (isset($_POST['submit'])) {
  $query = "SELECT * FROM food_menu WHERE id='" . $_POST["pid"] . "'";

        $result = mysqli_query($conn, $query);
        $productById = mysqli_fetch_assoc($result);

       $itemArray = array(
        $productById["item_name"]=>array(
            'item_id'=>$_POST["pid"],
            'userId' =>$userId,
            'item_name'=>$productById["item_name"],
            'image'=>$productById["image"],
            'description'=>$productById["description"],
            'price'=>$productById["price"])
      );

      if(!empty($_SESSION["zomato_cart"])) { 

        if (in_array($productById["item_name"],array_keys($_SESSION["zomato_cart"]))) {
            echo "<script> alert('Product alreay added'); </script>";
        } else {
          $_SESSION["zomato_cart"] = array_merge($_SESSION["zomato_cart"],$itemArray); 
          echo "<script> alert('Product added in cart'); </script>"; 
        }

        
      } else {
        $_SESSION["zomato_cart"] = $itemArray;
      }
       /*echo "<pre>";

       print_r($_SESSION["zomato_cart"]);*/
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
  <style type="text/css">
    .btn {
  border: 2px solid black;
  background-color: white;
  color: black;
  padding: 10px 28px;
  font-size: 16px;
  cursor: pointer;
  border: dotted;
}

/* Green */
.success {
  border-color: #4CAF50;
  color: green;
}

.success:hover {
  background-color: #4CAF50;
  color: white;
}

input[type=text] {
  
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  background-color: orange;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

  </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">FOODIES</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="registration.php">Food Menu</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="registration.php">Sign up</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Sign in</a>
      </li>

       <li class="nav-item">
        <a class="nav-link" href="cart.php">Track Order</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          My Account
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
  </div>
</nav>

<div class="container-fluid" style="background-image: url(https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRS_RTX2eDpeC1U50Itdp2P9QDSaEm3gNOGbHiOFID_DMtlCcch&usqp=CAU); background-position: center; background-repeat: no-repeat; background-size: cover; height: 500px;%;">
  <br><br>
<br><br><br>
  <h2 style="text-align: center;">Popular This Month in Your City</h2>
  <center><input type="text" name="" placeholder="search your food"> 
  <input type="submit" name="submit">
  </center>
<br>
</div>

 <br><br>
  <p style="text-align: center;">Popular Delecious food Here. <span style="color: red;">All Over India</span> </p>
  <hr>
<br><br>
  <h2 style="text-align: center;">Popular This Month in Your City</h2>
  <h4 style="text-align: center;">its very easy to get food as much as fast</h4>
<br>
<!-- 
<div class="container-fluid" style="padding-right: 0; padding-left: 0; margin-left: 0px; margin-right: 0px;">
  <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRS_RTX2eDpeC1U50Itdp2P9QDSaEm3gNOGbHiOFID_DMtlCcch&usqp=CAU" style="width: 100%;">
  <br><br>
  <p style="text-align: center;">Popular Delecious food Here. <span style="color: red;">All Over India</span> </p>
  <hr>
<br><br>
  <h2 style="text-align: center;">Popular This Month in Your City</h2>
  <h4 style="text-align: center;">its very easy to get food as much as fast</h4>
<br>
</div> -->
  
<div class="container-fluid">
  <div class="row">
    <?php

      $query = "SELECT * FROM `food_menu` LIMIT $offset, $no_of_records_per_page";

      $result = mysqli_query($conn, $query);

      while ($response = mysqli_fetch_assoc($result)) {
       

    ?>
    <div class="col-sm-4">
        <div class="card">
      <div class="card-body">
        <form method="post">
      <img src="https://i2.wp.com/www.vegrecipesofindia.com/wp-content/uploads/2018/10/litti-chokha-recipe-1.jpg" style="width: 100%; height: 200px;">
      <h4><?php echo $response['item_name']; ?></h4>
      <p><?php echo $response['description']; ?></p>
      <h5>Rs. <?php echo $response['price']; ?></h5>
      <input type="hidden" name="pid" value="<?php echo $response['id']; ?>">
      <button class="btn success" type="submit" name="submit" style="margin-left: 120px;">Order Now</button>
      </form>
    </div>
</div>
    </div>
<?php
  }
?>

  </div>
  <br>
  <ul class="pagination justify-content-center mb-4">
        <li class="page-item"><a href="?pageno=1"  class="page-link">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?> page-item">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>" class="page-link">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?> page-item">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?> " class="page-link">Next</a>
        </li>
        <li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>" class="page-link">Last</a></li>
    </ul>
</div>
<!-- Footer -->
<footer class="page-footer font-small blue pt-4" style="background-color: black; color: white;">

  <!-- Footer Links -->
  <div class="container-fluid text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-6 mt-md-0 mt-3">

        <!-- Content -->
        <h5 class="text-uppercase">Footer Content</h5>
        <p>Here you can use rows and columns to organize your footer content.</p>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none pb-3">

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">

        <!-- Links -->
        <h5 class="text-uppercase">Links</h5>

        <ul class="list-unstyled">
          <li>
            <a href="#!">Link 1</a>
          </li>
          <li>
            <a href="#!">Link 2</a>
          </li>
          <li>
            <a href="#!">Link 3</a>
          </li>
          <li>
            <a href="#!">Link 4</a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">

        <!-- Links -->
        <h5 class="text-uppercase">Links</h5>

        <ul class="list-unstyled">
          <li>
            <a href="#!">Link 1</a>
          </li>
          <li>
            <a href="#!">Link 2</a>
          </li>
          <li>
            <a href="#!">Link 3</a>
          </li>
          <li>
            <a href="#!">Link 4</a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="https://mdbootstrap.com/"> MDBootstrap.com</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
</body>
</html>
