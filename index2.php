<?php
    if (isset($_POST['submit'])) {
        
        $number = $_POST['number'];

        /*if ($number%2==0) {

            $result = "<h2 style='text-align: center; color: green;'>Even Number</h2>";
          
        } else {
            $result = "<h2 style='text-align: center; color: red;'>Odd Number</h2>";
        }*/

        if ($number%2==0) {

            $result = 1;
          
        } else {
            $result = 0;
        }

     /*   echo $result;

        die;*/
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Odd | Even</title>
</head>
<body>

    <p><?php echo "Hello"; ?></p>

    <p>
        <?php
        $number = 10;
            if ($number>5) {
               ?>
               Hello
               <?php
            }
        ?>
    </p>
    
    <h2 style="text-align: center; color: red;">
        <?php
            if (isset($result)) {

                if ($result==0) {
                    ?>
                    Odd Number
                    <?php
                    
                }
               
            }
        ?>
    </h2>
    <h2 style="text-align: center; color: green;">
        <?php
            if (isset($result)) {
                if ($result==1) {
                    ?>
                    Even Number
                    <?php
                }
            }
        ?>
    </h2>

    <form method="post">
        <label>Enter Your Number</label>
        <input type="number" name="number" placeholder="Enter Your Number" autocomplete="off" required>
        <input type="submit" name="submit" value="Check">
    </form>
</body>
</html>