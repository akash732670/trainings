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
				<td><input type="text" name="name"></td>
			</tr>

			<tr>
				<th><label>PHY:</label></th>
				<td><input type="number" name="phy"></td>
			</tr>

			<tr>
				<th><label>CHE:</label></th>
				<td><input type="number" name="che" ></td>
			</tr>

			<tr>
				<th><label>BIO:</label></th>
				<td><input type="number" name="bio" ></td>
			</tr>
			<tr>
			     <td><label>Maths</label></td>
				 <td><input type = "number" name = "math"/></td>
			</tr>
		
			<tr>
				<th colspan="2"><input type="submit" name="submit" value="Calculate"></th>
			</tr>
		</table>
		
	</form>

	<br>
	<br>
	<?php 
	
			if (isset($_POST['submit'])) {

                $name = $_POST['name'];
            
                if ($name =='') {
                    $message =  "Enter Your Name";	
                } else {
                    $emessage = true;
                }
                $phy = $_POST['phy'];
            
                if ($phy=='') {
                    $message2 =  "Enter Your Marks";	
                } else {
                    $emessage2 = true;
                }
                
                $che = $_POST['che'];
            
                if ($che =='') {
                    $message2 =  "Enter Your Marks";	
                } else {
                    $emessage2 = true;
                }
            
                $bio = $_POST['bio'];
            
                if ($bio =='') {
                    $message3 =  "Enter Your Marks";	
                } else {
                    $emessage3 = true;
                }
				$math = $_POST['math'];

				if($math == '') {
					$message4 = 'enter your marks'; 
				}
				else {
					$emessage4 = true;
				}

                 if ($name != ' ' && $phy != ' ' && $che != ' ' && $bio != ' ' && $math != '') {
                    $totalMarks = $phy + $che + $bio + $math;

                    $percentage = ($totalMarks/400)*100;
        
                    if ($percentage >= 90) {
						$grade = 'Excellence';
					}
					elseif ($percentage >= 80 && $percentage < 90) {
						$grade = 'A';
					}
					elseif ($percentage >= 70 && $percentage <80) {
						$grade = 'B+';
					}
					elseif ($percentage >= 60 && $percentage < 70) {
						$grade = 'B';
					}
					elseif ($percentage >= 40 && $percentage < 60) {
						$grade = 'C';
					}
					elseif ($percentage >= 30 && $percentage < 40) {
						$grade = 'D';
					}
					else {
						$grade = 'Bhaad mein jaoo';
					}
				}
			?>
		<table border="1" style="border-collapse: collapse;">
			<tr>
				<th><label>Name:</label></th>
				<td><?php echo $name; ?></td>
			</tr>

			<tr>
				<th><label>Total Marks:</label></th>
				<td><?php echo $totalMarks. " / 400"; ?></td>
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
			<?php
		}	
	 ?>

</body>
</html>