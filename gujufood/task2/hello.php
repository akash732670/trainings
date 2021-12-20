<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
    
   <form id="upload_form" enctype="multipart/form-data">
    <input type="text" name="name">
    <input type="text" name="ema">
    <input type="text" name="phone">
    <input type="file" name="file" id="uploadFile">
    <button type="button">Button</button>
   </form>
    
</form>


  </div>
  <script>
  
  $(document).ready(function(){
    $(document).on("click","button", function(){

      /*var file_data = $('#uploadFile').prop('files')*/

    var formData = $("#upload_form").serialize();
   $.ajax({
          type: "post",
          dataType: 'text',  // what to expect back from the PHP script, if anything
              cache: false,
              contentType: false,
              processData: false,
          url: "insert.php",
          data: formData,
          success:function(data) {
            $("#name").val('');
            alert(data);
            $("#myModal").modal("hide");
            getAllData();
          }
        });
    return false;
})
  });

</script>
</body>
</html>
