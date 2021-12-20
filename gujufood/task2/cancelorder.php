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
			<td colspan="2" style="text-align: center;"><b>Cancel Order #765767787</b></td>
		</tr>
		<tr>
			<th>Order Number</th>
			<th>Current Status</th>
		</tr>
		<?php
		    
		    $sql = "SELECT * FROM `order` AS o  WHERE o.order_id = '5303550' GROUP BY o.order_id";

		    $resultSql = mysqli_query($conn, $sql);
		    
		    $object = mysqli_fetch_object($resultSql);
		    
		        ?>
		<tr>
			<td><?php echo $object->order_id; ?></td>
			<td><?php echo $object->status; ?></td>
		</tr>
	</table>
	<form method="post">
	<label>Reason for Cancel</label>
	<textarea name="reason">
		
	</textarea>
	<button type="submit" name="submit">Update order</button>
	</form>
</body>
</html>