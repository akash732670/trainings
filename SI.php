<html>
<body>
  <form method = "post">
   <table>
      <tr>
         <td><label>Type the Principle Amount</label</td>
         <td><input type = "number" name = "principle"/></td>
      </tr>
      <tr>
         <td><label>Type the Rate</label</td>
         <td><input type = "number" name = "rate"/></td>
      </tr>
      <tr>
         <td><label>Type the year</label</td>
         <td><input type = "number" name = "year"/></td>
      </tr>
      <tr>
          <td><input type = "submit" name = "submit"/></td>
      </tr>
   </table>
   </form>
<?php 
     if(isset($_POST['submit'])) {
         $principle = $_POST['principle'];
         $rate = $_POST['rate'];
         $year = $_POST['year'];

         $amount = ($principle*$rate*$year)/100;

         $total = $amount + $principle;
?>
    <table>
        <tr>
            <td><?php echo $total ?></td>
        </tr>
    </table>
    <?php
     }
    ?>
</body>
</html>