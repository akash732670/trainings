<?php
	include_once 'config.php';
	

	if (strlen($_GET['id'])>0){

		$query = "SELECT * FROM `category` WHERE id =". $_GET['id'];
		$result = mysqli_query($conn,$query);
		$response = mysqli_fetch_object($result);

	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>view category</title>
	<style type="text/css">
		table{
			margin: auto;
		}
		table tr th,td{
			padding: 10px;
		}
		h1{
			text-align: center;
			color: #734d26;
		}
	</style>
</head>
<body>
	<h1>Detail</h1>
	<form method="post">
	<table border="1" style="border-collapse: collapse; width: 30%;">
		<tr>
			<th>Name</th>
			<td><?php echo $response->name; ?> </td>
		</tr>

		<tr>
			<th>Description</th>
			<td><?php echo $response->description; ?></td>
		</tr>

		

		<tr>
			<th colspan="2"><a href="index_category.php"><img src="icon/home.png"></a></th>
		</tr>
	</table>
	</form>
</body>
</html>