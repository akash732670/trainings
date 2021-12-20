<?php
  
  if(isset($_POST['submit'])) {
    $number = $_POST['year'];
    //echo $number;

    if($number%4==0) {
        $result = 0;
    }
    else{
        $result = 1;
    }
}

?>



<html>
<body>
<?php 
      if(isset($result)) {
          echo $result;
      }
    
    ?>

<h4 style="text-align: center; color: green;">
        <?php
            if (isset($result)) {

                if ($result==0) {
                    ?>
                    leap year
                    <?php
                }
            }
        ?>
    </h4>
    <h4 style="text-align: center; color: red;">
        <?php
            if (isset($result)) {
                if ($result==1) {
                    ?>
                    Not a leap year
                    <?php
                }
            }
        ?>
    </h4>
    <form method = "post">
    <label>Enter Year</label>
    <input type = "number" name = "year" required>
    <br><br>
    <input type="submit" name="submit" value="Check">
    </form>

</body>

</html>