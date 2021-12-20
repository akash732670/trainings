<?php
	include_once 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		body {
 			/*background-image: url("img_tree.gif"), url("paper.gif");*/
  			background-color: #009999;	
		}
		h1 {
			text-align: center;
			color:#990000;
			margin-top: 150px;
		}
		.btn {
 			 border: none;
 			 color: black;
 			 padding: 14px 28px;
 			 font-size: 16px;
 			 cursor: pointer;
 			 
		}			
		.category {
			background-color: #009933;
		} 
		.category:hover {
			background-color: #80ffaa;
		}

		.product {
			background-color: #996600;
		} 
		.product:hover {
			background-color: #ffcc66;
		}
		table{
			margin: auto;
		}
		a{
			text-decoration: none; 
		}
	</style>
	
<body>
	<h1>Welcome</h1>
	<table>
		<tr>
			<td>
				<a class="btn category" href="index_category.php">Category</a>
				<a class="btn product" href="index_product.php">Product</a>
			</td>
		</tr>
	</table>
	
	
</body>
</html>