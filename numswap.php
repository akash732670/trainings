<html>
<body>
   <form method = "post">
       <table>
          <tr>
             <td><label>Enter first number</label></td>
             <td><input type = "number" name = "num1"/></td>
          </tr>
          <tr>
             <td><label>Enter Second number</label></td>
             <td><input type = "number" name = "num2"/></td>
          </tr>
          <tr>
             <td><input type = "submit" name = "submit" value = "swap"/></td>
          </tr>
       </table>
   </form>
   <?php
    if(isset($_POST['submit'])) {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];

        $num1 = $num1 + $num2;
        $num2 = $num1 - $num2;
        $num1 = $num1 - $num2;

?>
   <table>
      <tr>
         <td><?php echo $num1 ?></td>
      </tr>
      <tr>
         <td><?php echo $num2 ?></td>
      </tr>
   </table>
   <?php
    }
   ?>
</body>
</html>