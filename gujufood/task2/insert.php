<?php
	$conn = mysqli_connect("localhost","root","","crud_mvc");

	if (isset($_POST)) {


		move_uploaded_file($_FILES['imageUpload']['tmp_name'], "uploads/".$_FILES['imageUpload']['name']);

		$name = $_POST['name'];

		echo $query = "INSERT INTO users (id,name,image) VALUES ('','$name','".$_FILES['imageUpload']['name']."')";

		$result = mysqli_query($conn, $query);

		if ($result==true) {
			echo "Inserted";
		} else {
			echo "Error";
		}
	}
?>