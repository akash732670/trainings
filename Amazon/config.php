<?php
	
	include_once 'vendor/autoload.php';
	
	$Publishablekey = "pk_test_51Io2wqSCATDyHKfPEntTzavndPjV7DCBENTI4oDOKgHxoaXSHukCv0DSRhfMIehUSCkgGowZ2gSNjQCPYpPIMEdW00D6bKQdU6";
	$Secretkey = "sk_test_51Io2wqSCATDyHKfPZEqPZ6C0ne4vw8sWcgLWCJwUKEjIgHBhpESiKB4Mtu4RMO01kmT22bFQpHH1PbMoqX3rbcsp00zmrdRFnF";

	\Stripe\Stripe::setApiKey($Secretkey);

?>