<?php
	$conn = mysqli_connect("localhost","root","","crud_mvc");

	if (isset($_GET)) {
		$delId = $_POST['delId'];

		$query = "DELETE FROM users WHERE id = '$delId'";

		$result = mysqli_query($conn, $query);

		if ($result==true) {
			echo "Deleted";
		} else {
			echo "Error";
		}
	}
?>