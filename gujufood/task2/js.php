<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
		<form name="contactForm" onsubmit="return validateForm()" method="post">
				<label>Name</label>
				<input type="text" name="name" id="name">
				 <div class="error" id="nameErr"></div>

				 <input type="text" name="name" id="email">
				 <div class="error" id="emailErr"></div>


				<input type="submit" name="submit">
		</form>


<script type="text/javascript">
	function validateForm() {
		var name = document.getElementById("name").value;

		var email = document.getElementById("email").value;

		var nameError = true;

		if(name == "") {

        	
    		document.getElementById("nameErr").innerHTML = "Please enter your name";

    			return false;

    	} else {

    		document.getElementById("nameErr").innerHTML = "";;


    		
    		
    	}

    	if(email == "") {

        	
    		document.getElementById("emailErr").innerHTML = "Please enter your name";

    			return false;

    	} else {

    		document.getElementById("emailErr").innerHTML = "";;


    		

    		
    	}

    	
	}
</script>
</body>
</html>