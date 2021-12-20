<?php
     
    if(isset($_POST['submit'])) {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $num3 = $_POST['num3'];


        if($num1 > $num2 && $num1 > $num3) {
            echo "<p>First value</p>";
        }
        else {
            if($num2 > $num1 && $num2 >$num3) {
                echo "<p>Second value</p>";
            }
            else {
                echo "<p>third value</p>";
            }
        }
    }



?>



<html>
<body>
    <form method = "post">
       <label>Enter your first number</label>
       <input type = "number" name = "num1"/>
       <br><br>
       <label>Enter your second number</label>
       <input type = "number" name = "num2"/>
       <br><br>
       <label>Enter your third number</label>
       <input type = "number" name = "num3"/>
       <br><br>
       <input type = "submit" name = "submit" value = "result"/>
    </form>
</body>
</html>