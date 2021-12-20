<?php
	include_once 'config.php';
	if(isset($_POST['choice'])){
		echo $choice;
		if (strlen($_GET['id'])>0){
				$query = "DELETE FROM `category` WHERE id =". $_GET['id'];
				$result = mysqli_query($conn,$query);
				if($result){
					header("location:index.php");
				}else{
					echo "error";
				}
		}else{
				echo "errorDone";
				//header("location:index.php");
		}
	}

`?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post">
	</form>
<script type="text/javascript">

	console.log("hello");
	var choice;
	function del_ok(){
		alert('Do you really want to delete this record?');
		console.log(choice);
    	if(choice === true) {
        	return choice;
    	}
    	return false;
	}
</script>
</body>
</html>