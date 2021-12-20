<?php
	
	$serverName = "localhost";
	$userName = "root";
	$password = "";
	$dbName = "practicaltask";
	$conn = mysqli_connect($serverName,$userName,$password, $dbName); 
	if (!$conn) {
		echo "Db Error";
	}

?>