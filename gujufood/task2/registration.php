<?php

$conn = mysqli_connect("localhost","root","","zomato");

if (isset($_POST['submit'])) {
  
  $firstName = $_POST['fname'];
  $lastName = $_POST['lname'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $password = md5($_POST['password']);
  $rePassword = md5($_POST['repeat_password']);

  $query = "INSERT INTO `users`(`id`, `first_name`, `last_name`, `email`, `mobile`, `password`, `rePassword`) VALUES ('','$firstName','$lastName','$email','$mobile','$password','$rePassword')";

  $queryEmail = "SELECT * FROM users WHERE email = '$email'";

  $queryPhone = "SELECT * FROM users WHERE mobile = '$mobile'";

  $resultEamil = mysqli_query($conn, $queryEmail);
  $resultMobile = mysqli_query($conn, $queryPhone);
  $rowcountEmail=mysqli_num_rows($resultEamil);
  $rowcountMobile=mysqli_num_rows($resultMobile);
  if ($rowcountEmail>0) {
    $error  ="Email Already Associated with zomato";
  } else if ($rowcountMobile>0) {
    $error  ="Mobile Already Associated with zomato";
  } else {

    if ($password != $rePassword) {
      $error  ="Password and Repeat Password is not same";
    } else {

      $result = mysqli_query($conn, $query);

      if ($result) {
        $success = "You have successfully Registered";
      } else {
        $error = "Something Error";
      }

    }

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
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
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
        <?php
          if (isset($error)) {
            ?>

        <p style="text-align: center; color: red;"><?php echo $error; ?></p>
            <?php
          }
        ?>

        <?php
          if (isset($success)) {
            ?>

        <p style="text-align: center; color: green;"><?php echo $success; ?></p>
            <?php
          }
        ?>
  <div class="card-body">
    <form method="post">
  <div class="form-row">
    <div class="col">
      <label>First Name</label>
      <input type="text" class="form-control"  name="fname">
    </div>
    <div class="col">
      <label>Last Name</label>
      <input type="text" class="form-control" name="lname">
    </div>
  </div>
  <div class="form-row">
    <div class="col">
      <label>Email Address</label>
      <input type="text" class="form-control"  name="email">
    </div>
    <div class="col">
      <label>Mobile Number</label>
      <input type="text" class="form-control" name="mobile">
    </div>
  </div>
  <div class="form-row">
    <div class="col">
      <label>Password</label>
      <input type="password" class="form-control"  name="password">
    </div>
    <div class="col">
      <label>Repeat password</label>
      <input type="password" class="form-control" name="repeat_password">
    </div>
  </div>
<br>
    <div class="form-row">
    <div class="col">
      <button type="submit" name="submit" class="btn" style="background-color: red; color: white;">Register</button>
       <button type="submit" name="submit" class="btn" style="background-color: red; color: white;margin-left: 190px;"> <a href="login.php" style="text-decoration: none;color: white;">Login</a> </button>
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
