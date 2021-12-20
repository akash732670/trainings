<?php
  include_once 'config.php';

  if (isset($_POST['submit'])) {  
    $name=$_POST['name'];
    $profile=$_FILES['profile'];
    $price=$_POST['price'];
        if ($name=='') {
            $error1 =  "Product Title can Not Found !";
        } elseif (strlen($name) < 5) {
            $error1="Product Title must be 5 characters";
        } else{
            $error3 = "true";
        }
         if ($price=='') {
            $errorp =  "Price can Not Found !";
        }else{
            $errorpr = "true";
        }
        // elseif (strlen($name) < ) {
        //     $error1="Name must be 5 characters";
        // } 
      $des=$_POST['comment'];
      if ($des=='') {
          $decerror="Description can not Found !";
      }elseif (strlen($des)<10) {
          $decerror="Name must be 10 characters";
      }else{
        $decsol="true";
      }
      if (isset($_POST['gender'])) {
            $gender = $_POST['gender'];
        } else {
            $gender = "";
        }
      function isa_convert_bytes_to_specified($bytes, $to, $decimal_places = 1) {
        $formulas = array(
            'K' => number_format($bytes / 1024, $decimal_places),
            'M' => number_format($bytes / 1048576, $decimal_places),
            'G' => number_format($bytes / 1073741824, $decimal_places)
        );
        return isset($formulas[$to]) ? $formulas[$to] : 0;
      }
      $size=isa_convert_bytes_to_specified($profile['size'], 'K');
      $ext = pathinfo($profile['name'], PATHINFO_EXTENSION);
      $profilename=$profile['name'];
      if($profile['name']=='')
      {
          $imagemi="select Image";
      }elseif ($ext !='png') {
          $imagemi="File extension must be png";
      }elseif ($size<50 || $size>500) {
          $imagemi="Picture size 100kb to 500kb";
      }elseif (file_exists("image/".$profile['name'])) {
          $imagemi="file allready exists";
      }else{
          $image="true";
      }
      if($gender=='') {
            $error2 =  "Gender Has Been Not Selected !";
        } else {
            $error4 = "true";
        }

    if (isset($_POST['tag'])) {
      $tag=$_POST['tag'];
    }
    else{
      $tag=array();
    }
   // echo $hobby;
    if (sizeof($tag)<1) {
      $msg="select minmum 1 hobby";
    }
    else{
      $msg1="true";
    }
  }
  if (isset($error3) && isset($error4) && isset($image) && isset($msg1) && isset($decsol) && isset($errorpr)) {
    if ($error3=="true" && $error4=="true" && $image=="true" && $msg1=="true" && $decsol=="true" && $errorpr=="true") {
          $catid=$_POST['cat_name'];
          $pname=$_POST['pname'];
          $price=$_POST['price'];
          $type=$_POST['type'];
          $tag=implode(",", $_POST['tag']);
          move_uploaded_file($profile['tmp_name'], "image/".$profile['name']);
         $query = "INSERT INTO product_tb (`Cat_name`, `pro_title`,`Description`,`image`,`price`,`type`,`tags`) VALUES ('$catid','$dpnamees','$des','$profilename','$price','$type','$tag')";
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
    <h2>Add Product</h2>
    <table border="1" style="border-collapse: collapse; width: 50%;">
    <tr>
      <th><label for="">Category</label></th>
      <th><select name="cat_name" style="width: 200px;">
              <option value="" selected>Select Category</option>
              <?php
                        $qry1="select *from category_tb";
                         $rs1=mysqli_query($conn,$qry1);
                        while ($rec1=mysqli_fetch_assoc($rs1)) {
                       echo   "<option value=".$rec1["id"].">".$rec1["Cat_name"]."</option>";  
                       }?>
                </select></th>
    </tr>
    <tr>
      <th><label for="">Product Title</label></th>
      <th><input type="text" name="pname" id=""> <span style="color:red;"><?php echo (isset($error1)) ? $error1 : ""; ?></span></span></th>
    </tr>
    <tr>
      <th><label for="">Description</label></th>
      <th><textarea rows="4" cols="50" name="comment"></textarea> <span style="color:red;"><?php echo (isset($decerror)) ? $decerror : ""; ?></span></th>
    </tr>
    <tr>
      <th><label for="">Image</label></th>
      <th><input type="file" name="profile"><span style="color:red;"><?php echo (isset($imagemi)) ? $imagemi : ""; ?></th>
    </tr>
    <tr>
      <th><label for="">Price</label></th>
      <th><input type="text" name="price" id="" placeholder="Enter Price"> <span style="color:red;"><?php echo (isset($errorp)) ? $errorp : ""; ?></span></span></th>
    </tr>
    <tr>
      <th><label for="">Type</label></th>
      <th><input type="radio" name="type" id="" value ="Man">Man
        <input type="radio" name="type" id="" value ="Woman">Woman
        <span style="color:red;"><?php echo (isset($error2)) ? $error2 : ""; ?></span></th>
    </tr>
    <tr>
      <th><label for="">Tags:</label></th>
      <th><input type="checkbox" id="" name="tag[]" value="Sports">
          <label for="vehicle1">Sports</label>
          <input type="checkbox" id="" name="tag[]" value="Music">
          <label for="vehicle2">Regular</label>
          <input type="checkbox" id="" name="tag[]" value="Reading">
          <label for="vehicle3">Seasonal</label>
          <span style="color:red;"><?php echo (isset($msg)) ? $msg : ""; ?></span></th>
    </tr>
    <tr>
      <th colspan="2"><input type="submit" name="submit"></th>
    </tr>
  </table>
    <!-- <a href="index.php">Back To home</a> -->
  </form>