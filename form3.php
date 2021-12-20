<?php 
		if (isset($_POST['submit'])) {
			$name = $_POST['name'];
			$phy = $_POST['phy'];
			$che = $_POST['che'];
			$bio = $_POST['bio'];

			if ($name == '') {
				
				$error1 = "<input type='text' name='name' style='border-color: red;'>";
			} else {
				$error1 = "<input type='text' name='name'>";
			}

			if ($phy == '') {
				echo $phyEr = "PHY Marks Can Not Blank";
			}

			if ($che == '') {
				echo $cheEr = "CHE Marks Can Not Blank";
			}

			if ($bio == '') {
				echo $bioEr = "BIO Marks Can Not Blank";
			}

			if ($name != '' && $phy != '' && $che != '' && $bio != '') {

				$totalMarks = $phy + $che + $bio;

				$percentage = ($totalMarks/300)*100;

				if ($percentage>80) {
					$grade = "<span style='color:green;'>A</span>";
				} else if ($percentage<=80 && $percentage>60) {
					$grade = "<span style='color:green;'>B</span>";
				} else if ($percentage<=60 && $percentage>40) {
					$grade = "<span style='color:orange;'>C</span>";
				} else if ($percentage<=40 && $percentage>30) {
					$grade = "<span style='color:yellow;'>D</span>";
				} else {
					$grade = "<span style='color:red;'>Fail</span>";
				}
			}
		}
			?>
<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
	<style type="text/css">
		table tr th,td {
			padding: 10px;
		}

		table {
			margin: auto;
		}
	</style>
</head>
<body>
	<form method="post">
		<table border="1" style="border-collapse: collapse;">
			<tr>
				<th><label>Name:</label></th>
				<td>
					<?php
						if (isset($error1)) {
							echo $error1;
						} else {
							?>
							<input type="text" name="name" ></td>
							<?php
						}
					?>
					
			</tr>

			<tr>
				<th><label>PHY:</label></th>
				<td><input type="number" name="phy"></td>
			</tr>

			<tr>
				<th><label>CHE:</label></th>
				<td><input type="number" name="che"></td>
			</tr>

			<tr>
				<th><label>BIO:</label></th>
				<td><input type="number" name="bio"></td>
			</tr>
		
			<tr>
				<th colspan="2"><input type="submit" name="submit" value="Calculate"></th>
			</tr>
		</table>
		
	</form>

	<br>
	<br>
	
		<<table border="1" style="border-collapse: collapse;">
			<tr>
				<th><label>Name:</label></th>
				<td><?php echo $name; ?></td>
			</tr>

			<tr>
				<th><label>Total Marks:</label></th>
				<td><?php echo $totalMarks. " / 300"; ?></td>
			</tr>

			<tr>
				<th><label>Percentage:</label></th>
				<td><?php echo number_format((float)$percentage, 2, '.', ''). " %"; ?></td>
			</tr>

			<tr>
				<th><label>Grade:</label></th>
				<td><?php echo $grade; ?></td>
			</tr>

			
		</table> 
			
	

</body>
</html>