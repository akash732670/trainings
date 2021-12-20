<?php
  include_once 'config.php';

  if (isset($_POST['submit'])) {  
    $name=$_POST['name'];
    
        if ($name=='') {
            $error1 =  "Name can Not Found !";
        } else{
            $error3 = "true";
        }
        // elseif (strlen($name) < ) {
        //     $error1="Name must be 5 characters";
        // } 
      $des=$_POST['comment'];
      if ($des=='') {
          $error2="Description can not Found !";
      }elseif (strlen($des)<10) {
          $error2="Name must be 10 characters";
      }else{
        $error4="true";
      }
  }
  if (isset($error3) && isset($error4)) {
    if ($error3=="true" && $error4=="true") {

         $query = "INSERT INTO category_tb (`Cat_name`, `Description`) VALUES ('$name','$des')";
        $result = mysqli_query($conn,$query);

        if ($result) {
          $successMessage =  "Category Created";
        } else {
          $errorMessage =  "Something Error";
        }
    }
  }
?>
<h1 style="text-align: center; color: blue;">Crud In Core-PHP</h1>
  <?php
    if (isset($successMessage)) {
      ?>
      <h3 style="color: green;"><?php echo $successMessage; ?></h3>
      <?php 
    } 

    if (isset($errorMessage)) {
      ?>
      <h3 style="color: red;"><?php echo $errorMessage; ?></h3>
      <?php 
    }
    
  ?>
<form action="" method="post" enctype="multipart/form-data">
    <h2>Add Category</h2>
    <table border="1" style="border-collapse: collapse; width: 50%;">
    <tr>
      <th><label for="">Name</label></th>
      <th><input type="text" name="name" id=""> <span style="color:red;"><?php echo (isset($error1)) ? $error1 : ""; ?></span></th>
    </tr>
    <tr>
      <th><label for="">Description</label></th>
      <th><textarea rows="4" cols="50" name="comment"></textarea> <span style="color:red;"><?php echo (isset($error2)) ? $error2 : ""; ?></span></th>
    </tr>
    <tr>
      <th colspan="2"><input type="submit" name="submit"></th>
    </tr>
  </table>
    <!-- <a href="index.php">Back To home</a> -->
  </form>