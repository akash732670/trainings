<html>
<head>
	<title></title>
	<style type="text/css">
		.id tr th,td {
			padding: 10px;

		}

		.id {
			margin: auto;
		}

		select , input[type=number] {
			width: 100%;
		}
	</style>
</head>
<body>
	<table class = "id" border="1" style="border-collapse: collapse; width: 50%;" >
		<form method="post">
			<tr>
				<td><label>Name of Employee</label></td>
            <td><input type = "text" name = "name"/></td>
			</tr>


			<tr>
				<th>Position</th>
				<td>
					<select name="position" required>
						<option value="">Select</option>
						<option value="Manager">Manager</option>
						<option value="CEO">CEO</option>
						<option value="Developer">Developer</option>
						<option value="Sales">Sales</option>
					</select>
				</td>
			</tr>
           

			<tr>
				<th>Basic Salary</th>
				<td>
					<input type="number" name="basic" placeholder="Basic Salary" required>
				</td>
			</tr> 

			<tr>
				<th colspan="2">
					<input type="submit" name="submit">
				</th>
			</tr>
		</form>
	</table>
   <?php
   if (isset($_POST['submit'])) {
		
		$empName = $_POST['name'];
		$position = $_POST['position'];
		$basicSalary = $_POST['basic'];

		if ($basicSalary>=5000) {
			
			$hra = ($basicSalary*40)/100;
			$pf = ($basicSalary*11)/100;
			$da = ($basicSalary*30)/100;
			$pt = 150;
			$esi = ($basicSalary*6)/100;

			$grossSalary = ($basicSalary+$hra+$pf+$da+$pt+$esi);

			$takeHomeSalary = $grossSalary - ($pf + $pt + $esi);

			$deducationAmount = $pf + $pt + $esi;

			$earninigAmount = ($basicSalary+$hra+$da);

		} else {
			echo "Basic Salary is Less than 5000";
		}
   ?>
    <table>
    <tr>
    <td><label>Employee name</label></td>
    <td><?php echo  $empName?></td>
    </tr>
    <tr>
    <td><label>Designation</label></td>
    <td><?php echo  $position?></td>
    </tr>
    </table>
    <table class = "id" border="1" style="border-collapse: collapse; width: 50%;">
    <tr>
    <th>Earning</th>
    <th></th> 
    <th>Deduction</th>
    <th></th>
  </tr>
  <tr>
    <td>Basic & DA</td>
    <td><?php echo $da ?></td>
    <td>Provident fund</td>
    <td><?php echo $pf ?></td>
  </tr>
  <tr>
    <td>HRA</td>
    <td><?php echo $hra ?></td>
    <td>E.S.I</td>
    <td></td>
  </tr>
  <tr>
    <td>John</td>
    <td>Doe</td>
    <td>80</td>
    <td></td>
  </tr>
    </table>

<?php
   }
?>
</body>
</html>