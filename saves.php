<html>
<body>
     <form method = "post">
        <table>
            <tr>
               <td><label>Enter your number</label></td>
               <td><input type = "number" name = "num1"/></td>
            </tr>
            <tr>
            <td><input type = "submit" name = "submit"/></td> 
            </tr>
        </table>
     </form>
     <?php
      if(isset($_POST['submit'])) {
        $num = $_POST['num1'];

       if($num%$num == 1 && $num%1 == $num) {
           $message = 'this is the prime number';
       }
       else {
           $message = 'this is not a prime number';
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