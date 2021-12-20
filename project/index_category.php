<?php
	include_once 'config.php';

	if (isset($_POST['Delete'])) {

		if (isset($_POST['deleteMultiple'])) {
			$deleteMultiple = $_POST['deleteMultiple'];





			$queryD = "DELETE 
				FROM users
				WHERE id IN (".implode(',', $deleteMultiple).")";

			$resultDelete = mysqli_query($conn, $queryD);

			if ($resultDelete) {
				echo '<script>alert("Deleted")</script>';
			} else {
				echo '<script>alert("Error")</script>';
			}
		

		} else {
			
			echo '<script>alert("No Checkbox Selected")</script>';
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
			padding: 8px;
		}
	</style>
</head>
<body>
	<br/>
	<h1 style="text-align: center; color: #734d26;">Category Detail</h1>
	<a href="add_category.php"><img src="icon/person.png"></a>
	<br>
	<form method="post">
		<table border="1" style="border-collapse: collapse; width: 90%;">
		<tr>
			<th><input type="checkbox" id="selectAllC" onclick="selectAll();">Select All</th>
			<th>Sl.No</th>
			<th>Name</th>
			<th>Description</th>
			<th>Created At</th>
			<!--<th>Updated At</th>-->
			<th>Action</th>
		</tr>

		<?php
			$query = "SELECT * FROM category";
			$resultData = mysqli_query($conn,$query);


			if ($resultData->num_rows<1) {
				?>
					<tr>
						<th style="color: red;" colspan="13">No Record Found</th>
					</tr>
				<?php
			} else {

			$i = 1;
			while ($response = mysqli_fetch_assoc($resultData)) {
			?>
		<tr>
			<td> <input type="checkbox" class="deleteMultiple" name="deleteMultiple[]" onclick="CheckUncheckHeader();" value="<?php echo $response['id']; ?>"> </td>
			
			<td><?php echo $i++; ?></td>
			<td><?php echo $response['name']; ?></td>
			<td><?php echo $response['description']; ?></td>
			<td><?php echo DateTime::createFromFormat('Y-m-d H:i:s', $response['created_at'])->format('Y-m-d'); ?></td>
			<!--<td><?php echo $response['updated_at']; ?></td>-->
			<td><a href="view_cat.php?id=<?php echo $response['id'];?>"><img src="icon/visibility.png"></a> <a href="edit.php?id=<?php echo $response['id'];?>"><img src="icon/editt.png"></a> <a href="delete_cat.php?id=<?php echo $response['id'];?>"> <img src="icon/delete.png" onclick="Warn();"></a></td>img> </a></td>
		</tr>

		<?php
		}
		}
		?>
		<tr>
			<td> <input type="submit" name="Delete" value="Delete"> </td>
			<td colspan="12"></td>
		</tr>
	</table>
</form>

<script type="text/javascript">
		
		function selectAll() {
			
			var selectAllC = document.getElementById('selectAllC');
			var checkbox = document.getElementsByClassName('deleteMultiple');
			for(var i = 0; i<checkbox.length; i++) {
				if (checkbox[i].checked) {
					checkbox[i].checked = false;
					//count++;
					//selectAllC.checked=false;

				} else {
					checkbox[i].checked = true;
					//count++;

				}
			}

			if(selectAllC.checked == true){
				for(var i = 0; i<checkbox.length; i++) {
					checkbox[i].checked = true;
				}
			}
		}


		//console.log(selectAllC.checked = false);
		 function CheckUncheckHeader(){
			 	var selectAllC = document.getElementById('selectAllC');
			 	selectAllC.checked = true;
			 	var checkbox = document.getElementsByClassName('deleteMultiple');

			 	for(var i = 0; i<checkbox.length; i++) {
				 if (!checkbox[i].checked) {
                    selectAllC.checked = false;
                    break;
                }
				}	
		 }
	


		
		
		
	</script>

</body>
</html>