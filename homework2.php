<html>
<body>
  <form method = "post">
    <table>
       <tr>
          <td><label>Phycics</label></td>
          <td><input type = "number" name = "phy" required/></td>
       </tr>
       <tr>
          <td><label>Chemistry</label></td>
          <td><input type = "number" name = "Chem" required/></td>
       </tr>
       <tr>
          <td><label>Biology</label></td>
          <td><input type = "number" name = "Bio" required/></td>
       </tr>
       <tr>
          <td><label>Maths</label></td>
          <td><input type = "number" name = "Math" required/></td>
       </tr>
       <tr>
          <td><label>Computer</label></td>
          <td><input type = "number" name = "Comp" required/></td>
       </tr>
       <tr>
          <td><input type = "submit" name = "submit" value = "get Result"/></td>
       </tr>
    </table>
  </form>

  <?php
   if(isset($_POST['submit'])) {
      $phy = $_POST['phy'];
      $chem = $_POST['Chem'];
      $bio = $_POST['Bio'];
      $math = $_POST['Math'];
      $comp = $_POST['Comp'];

      if($phy == "") {
          $message = 'please write your marks';
      }
      else {
          $emessage = true;
      }
      
      if($chem == "") {
        $message1 = 'please write your marks';
    }
    else {
        $emessage1 = true;
    }
    
    if($bio == "") {
        $message2 = 'please write your marks';
    }
    else {
        $emessage2 = true;
    }
    
    if($math == "") {
        $message3 = 'please write your marks';
    }
    else {
        $emessage3 = true;
    }
    
    if($comp == "") {
        $message4 = 'please write your marks';
    }
    else {
        $emessage4 = true;w
    }

   if($phy != '' && $chem != '' && $bio != '' && $math != '' && $comp != '') {
       $totalmark = $phy + $chem + $bio + $math + $comp;

       $percentage = ($totalmark/500)*100;
   }

?>
<table>
   <tr>
       <td><label>Result</label></td>
       <td><?php echo $percentage ?></td>
   </tr>
</table>
<?php 
   }
?>
</body>
</html>