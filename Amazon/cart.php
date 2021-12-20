<?php
	include 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container mt-5">
  <h2>Checkout Page</h2> 
         
  <table class="table table-bordered mt-5">
    <tr>
    	<th>Product Name</th>
    	<td><?php echo $_POST['pname']; ?></td>
    </tr>
    <tr>
    	<th>Product Quantity</th>
    	<td><?php echo $_POST['qty']; ?></td>
    </tr>
    <tr>
    	<th>Total Price</th>
    	<td><?php echo ($_POST['qty']*$_POST['price']); ?></td>
    </tr>
  </table>
<form action="payment.php" method="post">
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="<?php echo $Publishablekey?>"
    data-amount="<?php echo (($_POST['qty']*$_POST['price'])*100); ?>"
    data-name="T-shirt"
    data-description="Cool T-Shirt"
    data-image="https://growwithphp.com/wp-content/uploads/2020/08/cropped-logo-1-2.png"
    data-currency="inr"
    data-email="sharvank1515@gmail.com"
  >
  </script>
  <input type="hidden" name="price" value="<?php echo ($_POST['qty']*$_POST['price']); ?>">
</form>
</div>

</body>
</html>
