<form method="post">
	<label>Enter Your Number</label>
	<input type="number" name="number">
	<input type="submit" name="submit">
</form>
<?php
if (isset($_POST['submit'])) {
	$number = $_POST['number'];
	$count = 0;
	if ($number<1) {
		
		echo "Number is Not Valid";

	} else {

		if ($number==1) {
			echo "1 Prime Number";		
		} else {

			for($i=1; $i<=$number; $i++) {

				if ($number%$i==0) {
					$count++; //2
				}

			}

			if ($count==2) {
				echo "Number is Prime ";
			} else {
				echo "Number is Not Prime ";
			}
		}

	}

}

?>