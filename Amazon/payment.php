<?php
include_once 'vendor/autoload.php';
require('config.php');

\Stripe\Stripe::setApiKey($Secretkey);

if(isset($_POST['stripeToken'])){

	\Stripe\Stripe::setVerifySslCerts(false);

	$token=$_POST['stripeToken'];

	$data=\Stripe\Charge::create(array(
		"amount"=>($_POST['price']*100),
		"currency"=>"inr",
		"description"=>"Grow With PHP",
		"source"=>$token,
	));


	if($data->status=='succeeded') {
		?>
		<script type="text/javascript">
			location.href = 'https://dashboard.stripe.com/test/payments?status%5B%5D=successful';
		</script>
		<?php
	}
}
?>