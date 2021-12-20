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
			<td colspan="4" style="text-align: center;"><b>Invoice of #<?php echo $_GET['oid']; ?></b></td>
		</tr>
		<tr>
			<th>#</th>
			<th>Food</th>
			<th>Food Name</th>
			<th>Price</th>
		</tr>
		<?php
		    
		    $sql = "SELECT fm.item_name,fm.description,fm.image,fm.quantity,fm.price FROM `order` AS o LEFT JOIN food_menu AS fm ON fm.id = o.item_id WHERE o.order_id = '".$_GET['oid']."'";

		    $resultSql = mysqli_query($conn, $sql);
		    $total = 0;
		    $slNo = 1;
		    while ($responsive = mysqli_fetch_assoc($resultSql)) {
		    $total = $total+$responsive['price'];
		        ?>
		<tr>
			<td><?php echo $slNo++; ?></td>
			<td style="text-align: center;"><img src="https://www.archanaskitchen.com/images/archanaskitchen/0-Archanas-Kitchen-Recipes/2019/Pudina_Laccha_Paratha_recipe_17.jpg" style="height: 50px; width: 50px;"></td>
			<td><?php echo $responsive['item_name']; ?></td>
			<td><?php echo $responsive['price']; ?></td>
		</tr>
		<?php
		}
		?>
		<tr>
			<td colspan="3" style="text-align: center;"><b>Grand Total</b></td>
			<td><?php echo $total; ?></td>
		</tr>
	</table>
</body>
</html>