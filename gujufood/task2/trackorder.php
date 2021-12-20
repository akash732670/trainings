<?php
	
  session_start();
$conn = mysqli_connect("localhost","root","","zomato");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		table {
			border-collapse: collapse;
		}
	</style>
</head>
<body>
	<table border="1px solid black" style="width: 100%;">
		<tr>
			<td colspan="4" style="text-align: center;"><b>Food Tracking History of #<?php echo $_GET['oid']; ?></b></td>
		</tr>
		<tr>
			<th>#</th>
			<th>Remark</th>
			<th>Status</th>
			<th>Time</th>
		</tr>
		<?php
		    
		    $sql = "SELECT * FROM `order_tracking` WHERE order_id = '".$_GET['oid']."'";

		    $resultSql = mysqli_query($conn, $sql);
		    $slNo = 1;
		    while ($responsive = mysqli_fetch_assoc($resultSql)) {
		        ?>
		<tr>
			<td><?php echo $slNo++; ?></td>
			<td><?php echo $responsive['remark'] ?></td>
			<td><?php echo $responsive['order_status']; ?></td>
			<td><?php echo $responsive['created_at']; ?></td>
		</tr>
		<?php
		}
		?>
		
	</table>
</body>
</html>