<?php
	include_once 'config.php';




	
	if (isset($_POST['submit'])) {	
		$name = $_POST['name'];
		$description = $_POST['des'];
		
		if($name == ''){
			$error1 = "Please enter your name";
		}else{
			$error11 = "true";
		}
		
		if($description == ''){
			$error2 = "please add some description about this category";
		}else{
			$error12 = "true";
		}
		

		if(isset($error11) && isset($error12) ){
        	if($error11 == "true" && $error12 == "true" ){
        		
        		echo $query = "INSERT INTO category (`name`, `description`) VALUES ('$name','$description')";

				$result = mysqli_query($conn,$query);

				if($result){
					$successMessage = "User Created";
				}else{
					$errorMessage = "User Not Created";
				}
        	}
        }else{
        	echo "please fill valid detail";
        }
        

		
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		table {
			margin: auto;
		}
		h2 {
			text-align: center;
		}
		table tr th,td {
			padding: 10px;
		}
	</style>
</head>
<body>
	<h1 style="text-align: center; color: blue;">Crud In Core-PHP</h1>
	<?php
		if (isset($successMessage)) {
			?>
			<h2 style="color: green;"><?php echo $successMessage; ?></h2>
			<?php	
		} 

		if (isset($errorMessage)) {
			?>
			<h2 style="color: red;"><?php echo $errorMessage; ?></h2>
			<?php	
		}
		
	?>
	<form method="post">
		<table border="1" style="border-collapse: collapse; width: 30%;">
			<tr>
				<th>Name:</th>
				<td>
					<input type="text" name="name" style="width: -webkit-fill-available;" >
					<span style="color:red"><?php echo isset($error1)?$error1 :''; ?></span>
				</td>
			</tr>
			<tr>
				<th>Description:</th>
				<td>
					<textarea name="des" rows="3" cols="38" style="width: -webkit-fill-available;" ></textarea>
					<span style="color:red"><?php echo isset($error2)?$error2 :''; ?></span>
				</td>
			</tr>
			

			<tr>
				<th colspan="2"><input type="submit" name="submit"></th>
			</tr>
			<tr>
				<th colspan="2"><a href="index_category.php">Back To Home</a></th>
			</tr>
		</table>
	</form>

	

</body>
</html>