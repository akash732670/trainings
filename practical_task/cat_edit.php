<?php
  include_once 'config.php';
  date_default_timezone_set("Asia/kolkata");
  if (strlen($_GET['id'])>0) {
  $qry="select *from category_tb";
  $rs=mysqli_query($conn,$qry);
$response = mysqli_fetch_object($rs);
}
else{
  header("Location: cat_listing.php");
}
  if (isset($_POST['update'])) {  
    $name=$_POST['name'];
    $udTime =  date("Y-m-d H:i:s");
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

         $query = "UPDATE `category_tb` SET `Cat_name`='$name',`Description`='$des',`updated_at`='$udTime' WHERE id = ".$_GET['id'];
        $result = mysqli_query($conn,$query);

        if ($result) {
          $successMessage =  "Category update";
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
      <th><input type="text" name="name" value="<?php echo $response->Cat_name;  ?>"> <span style="color:red;"><?php echo (isset($error1)) ? $error1 : ""; ?></span></th>
    </tr>
    <tr>
      <th><label for="">Description</label></th>
      <th><textarea rows="4" cols="50" name="comment"><?php echo $response->Description; ?></textarea> <span style="color:red;"><?php echo (isset($error2)) ? $error2 : ""; ?></span></th>
    </tr>
    <tr>
      <th colspan="2"><input type="submit" name="update" value="Update"></th>
    </tr>
  </table>
    <!-- <a href="index.php">Back To home</a> -->
  </form>