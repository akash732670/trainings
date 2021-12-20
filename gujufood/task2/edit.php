<?php
	$conn = mysqli_connect("localhost","root","","crud_mvc");

	if (isset($_GET)) {
		$editId = $_POST['editId'];

		$query = "SELECT * FROM users WHERE id = '$editId'";

		$result = mysqli_query($conn, $query);

		$object = mysqli_fetch_assoc($result);

		echo json_encode($object);
	}
?>