<?php 
	if(isset($_POST['submit'])) {
		$number1 = $_POST['number1'];
		$number2 = $_POST['number2'];
		$opertaion = $_POST['opertaion'];

		switch ($opertaion) {
			case '+':
				$result = $number1 + $number2;
				break;

			case '-':
				$result = $number1 - $number2;
				break;

			case '*':
				$result = $number1 * $number2;
				break;

			case '/':
				$result = $number1 / $number2;
				break;
			
			default:
				$result = "Error";
				break;
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		table tr th,td{
			padding: 10px;
		}
		table {
			margin: auto; 
		}
	</style>
</head>
<body>
	<h2 style="text-align: center; color: blue;">Simple Calculator Using PHP (Switch)</h2>
	<table border="1" style="border-collapse: collapse;">
		
		<form method="post">
			<tr>
				<th><label>First Number: </label></th>
				<td><input type="number" name="number1" required></td>
			</tr>
			<tr>
				<th><label>Second Number: </label></th>
				<td><input type="number" name="number2" required></td>
			</tr>
			<tr>
				<th><label>Opertaion: </label></th>
				<td><select name="opertaion" style="width: -webkit-fill-available;" required>
					<option value="">select</option>
					<option value="+">+</option>
					<option value="-">-</option>
					<option value="*">*</option>
					<option value="/">/</option>
				</select></td>
			</tr>
			<tr>
				<th colspan="2"><input type="submit" name="submit"></th>
			</tr>
		</form>
	</table>

	<br>
	<br>
	<?php
		if (isset($result)) {
	?>
	<table border="1" style="border-collapse: collapse;">
		
		<form method="post">
			<tr>
				<th><label>Result: </label></th>
				<td><input type="number" name="number1" disabled value="<?php echo $result; ?>"></td>
			</tr>
		</form>
	</table>
	<?php
		}
	?>
</body>	
</html> 