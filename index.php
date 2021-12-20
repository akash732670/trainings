<?php 

	// Data Types


	$name = "sharvan kumar"; // string
	$email = "s@gmail.com";
	$mobile = 556; // Number
	$college = "GIET Gunupur";

	$test = 6.5; // float

	$value = true; // boolean

	$data = array("sharvan","Bhargav","rutu","akash"); // array

	$dataT = null; // null // 0

	//object

	//var_dump($data); // check the data type

	//echo strlen($name); // check the length of word

	//echo str_word_count($name);

	//echo strrev($name);

	//echo strpos("Hello This is Sharvan Kumar", "Sharvan");

	//echo str_replace("Sharvan", "PHP", "Hello This is Sharvan Kumar");
?> 



<!DOCTYPE html>
<html>
<head>
	<title>Student</title>
	<style type="text/css">
		table tr th,td {
			padding: 10px;
		}
	</style>
</head>
<body>
	<table style="border-collapse: collapse;">
		<tr>
			<th>Name</th>
			<td><?php echo 	$name; ?></td>
		</tr>
		<tr>
			<th>Email</th>
			<td><?php echo $email; ?></td>
		</tr>
		<tr>
			<th>Mobile</th>
			<td><?php echo $mobile; ?></td>
		</tr>
		<tr>
			<th>College</th>
			<td><?php echo $college; ?></td>
		</tr>
	</table>
</body>
</html>