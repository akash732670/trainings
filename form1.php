<?php
	if (isset($_POST['submit'])) {

	$name = $_POST['name'];

	if ($name=='') {
		$message =  "Enter Your Name";	
	} else {
		$emessage = true;
	}
	$email = $_POST['email'];

	if ($email=='') {
		$message2 =  "Enter Your Email";	
	} else {
		$emessage2 = true;
	}

	$mobile = $_POST['mobile'];

	if ($mobile=='') {
		$message3 =  "Enter Your Mobile";	
	} else {
		$emessage3 = true;
	}

	$gender = isset($_POST['gender']);

	if ($gender) {
		
		$gender = $_POST['gender'];
		$emessage4 = true;
	} else {
		$message4 = "select your gender";
	}



	
	}

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
		<table border="1" width="50%;" style="border-collapse: collapse;">
			<tr>
				<th>Name</th>
				<td><input type="text" name="name"> <?php  if(isset($message)) { echo $message;} ?></td>
			</tr>
			<tr>
				<th>Email</th>
				<td><input type="email" name="email"> <?php  if(isset($message2)) { echo $message2;} ?></td>
			</tr>
			<tr>
				<th>Mobile No</th>
				<td><input type="text" name="mobile"> <?php  if(isset($message3)) { echo $message3;} ?></td>
			</tr>
			<tr>
				<th>Gender</th>
				<td>
					<input type="radio" name="gender" value="Male">Male
					<input type="radio" name="gender" value="Female">Female
					<span><?php  if(isset($message4)) { echo $message4;} ?><span>

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

			if ((isset($emessage) && isset($emessage2) && isset($emessage3) && isset($emessage4)) ==true) {
				
			
			?>
			<table border="1" width="30%;" style="border-collapse: collapse;">
			<tr>
				<th>Name</th>
				<td><?php echo $name; ?></td>
			</tr>
			<tr>
				<th>Email</th>
				<td><?php echo $email; ?></td>
			</tr>
			<tr>
				<th>Mobile No</th>
				<td><?php echo $mobile; ?></td>
			</tr>
			<tr>
				<th>Gender</th>
				<td>
					<?php echo $gender; ?>
				</td>
			</tr>
			
		</table>
			<?php
		}
	}

	?>
		
</body>
</html>