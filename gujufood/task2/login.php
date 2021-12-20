<?php
session_start();
$conn = mysqli_connect("localhost","root","","zomato");

if (isset($_POST['submit'])) {
  
  $userName = $_POST['username'];
  $password = md5($_POST['password']);

  $query = "SELECT * FROM users WHERE (email = '$userName' AND password = '$password') OR (mobile = '$userName' AND password = '$password')";
  $result = mysqli_query($conn, $query);
  $rowcount=mysqli_num_rows($result);
  if ($rowcount>0) {
    $_SESSION['userName'] = $userName;
    header("Location: index.php");
  } else {
    $error  ="Wrong Input";
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
  <br>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-7">
      <div class="card">
  <div class="card-body">
    <form method="post">
  <div class="form-row">
    <div class="col">
      <label>Registered Email or Contact Number</label>
      <input type="text" class="form-control" name="username" placeholder="Registered Email or Contact Number">
    </div>
  </div>
   <div class="form-row">
    <div class="col">
      <label>First Name</label>
      <input type="password" name="password" class="form-control" placeholder="Password">
    </div>
  </div>
  
<br>
     <div class="form-row">
    <div class="col">
      <button type="submit" name="submit" class="btn" style="background-color: red; color: white;">Login</button>
       <button type="submit" name="submit" class="btn" style="background-color: red; color: white;margin-left: 190px;"> <a href="registration.php" style="text-decoration: none;color: white;">Register</a> </button>
    </div>
  </div>

</form>
  </div>
</div>
    </div>
    <div class="col-sm-4">
        <h4>Registration is fast, easy, and free.</h4>
        <hr>
        <img src="https://i2.wp.com/www.vegrecipesofindia.com/wp-content/uploads/2018/10/litti-chokha-recipe-1.jpg" style="width: 100%;">

        <h4>Contact Customer Support</h4>
        <p>Hello thuis is bihari litti choka Hello thuis is bihari litti choka Hello thuis is bihari litti choka</p>
    </div>

  </div>
</div>
    

</body>
</html>
