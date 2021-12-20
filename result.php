<html>
   <body>
       <form method = "post">
           <table>
                <tr>
                   <td><label>Enter your name</label></td>
                   <td><input type = "text" name = "stuname"/></td>
                </tr>
                <tr>
                   <td><label>Enter your first number</label></td>
                   <td><input type = "number" name = "num1"/></td>
                </tr>
                <tr>
                   <td><label>Enter your Second Number</label></td>
                   <td><input type = "number" name = "num2"/></td>
                </tr>
                <tr>
                   <td><label>Enter your third Number</label></td>
                   <td><input type = "number" name = "num3"/></td>
                </tr>
                <tr>
                   <td><input type = "submit" name = "submit" value = "Check"/></td>
                </tr>
                <?php
                   if(isset($_POST['submit'])) {
                       
                       $num1 = $_POST['num1'];
                       $num2 = $_POST['num2'];
                       $num3 = $_POST['num3'];
                     
                       if($num1 > $num2 && $num1 > $num3) {
                           $message = 'first number is the biggest';
                       }
                       elseif($num2 > $num1 && $num2 > $num3) {
                            $message = 'Second number is the biggest';
                       }
                       elseif ($num3 > $num1 && $num3 > $num2) {
                          $message = 'third number is the biggest';
                       }
                       elseif($num1 > $num2 && $num1 == $num3) {
                          $message = 'first and third number are same';
                       }
                       elseif ($num2 > $num1 && $num2 == $num3) {
                          $message = 'second and third number are same';
                       }
                       elseif($num1 > $num3 && $num1 == $num2) {
                          $message = 'first and second number are same';
                       }
                       else {
                          $message = 'all three numbers are same';
                       }
                ?>

                <table>
                   <tr>
                      <td><?php echo $message ?></td>
                   </tr>
                </table>

             <?php
                   }
             ?>
   </body>
</html>