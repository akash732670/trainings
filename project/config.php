<?php
	
	$serverName = "localhost";
	$userName = "root";
	$password = "";
	$dbName = "php_4pm";
	$conn = mysqli_connect($serverName,$userName,$password, $dbName); 
	if (!$conn) {
		echo "Db Error";
	}
	

?>