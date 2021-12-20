<?php
		
	

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
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
		<table border="1" width="30%;" style="border-collapse: collapse;">
			<tr>
				<th>Full Name</th>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<th>Email Id</th>
				<td><input type="email" name="email"></td>
			</tr>
			<tr>
				<th>Mobile No.</th>
				<td><input type="text" name="mobile"></td>
			</tr>
			<tr>
				<th>gender</th>
				<td>
					<input type="radio" name="gender" value="Male">Male
					<input type="radio" name="gender" value="Female">Female
				</td>
			</tr>
			<tr>
				<th colspan="2"><input type="submit" name="submit"></th>
			</tr>
		</table>
	</form>
	<br><br>

	<?php

		if (isset($_POST['submit'])) {

			$name = $_POST['name'];
			$email = $_POST['email'];
			$mobile = $_POST['mobile'];
			$gender = $_POST['gender'];
			?>
			<table width="30%;" style="border-collapse: collapse;">
			<tr>
				<th>full Name</th>
				<td><?php echo $name; ?></td>
			</tr>
			<tr>
				<th>Email Id</th>
				<td><?php echo $email; ?></td>
			</tr>
			<tr>
				<th>Mobile No.</th>
				<td><?php echo $mobile; ?></td>
			</tr>
			<tr>
				<th>gender</th>
				<td>
					<?php echo $gender; ?>
				</td>
			</tr>
			
		</table>
			<?php
		}

	?>
		
</body>
</html>