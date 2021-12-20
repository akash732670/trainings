<?php
	$conn = mysqli_connect("localhost","root","","crud_mvc");
	date_default_timezone_set("Asia/Calcutta");
	if (isset($_GET)) {
		$updateId = $_POST['updateId'];
		$name = $_POST['name'];
		$query = "UPDATE users SET name = '$name',created_at = '".date("Y-m-d H:i:s")."' WHERE id = '$updateId'";

		$result = mysqli_query($conn, $query);


		echo json_encode($result);
	}
?>