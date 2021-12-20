<?php 
    
    if(isset($_POST['submit'])) {
        $number = $_POST['number'];
        //echo $number;

        if($number >= 0) {
            $result = "<h2 style = 'color: blue; text-align: center;'>Positive Number</h2>";
        }
        else{
            $result = "<h2 style = 'color: red; text-align: center;'>Negative Number</h2>";
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

     
    <form method="post">
        <label>Enter Your Number</label>
        <input type="number" name="number" placeholder="Enter Your Number" autocomplete="off" required>
        <input type="submit" name="submit" value="Check">
    </form>   
       


</body>
</html>