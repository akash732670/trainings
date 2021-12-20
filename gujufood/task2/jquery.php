<!DOCTYPE html>
<html>
<head>
	<title>Jquery</title>
	<script src="Jquery.js"></script>
</head>
<body>

	<input type="text" name="name" id="name"><span id="result"></span>
<button id="hide">Hide</button>
<!-- 
<button id="show">Show</button> -->

<p>Hello this is test</p>
<script type="text/javascript">
	$(document).ready(function(){
/*		$(document).on("click", "#hide", function(){
			$("p").hide();
		})


		$(document).on("click", "#show", function(){
			$("p").show();
		})
*/

		$(document).on("click", "#hide", function(){
			
			var name  = $("#name").val();

			if (name=='') {
				$("#result").html("<p style = 'color:red;'>Error</p>");
			}

		})


	});
</script>
</body>
</html>