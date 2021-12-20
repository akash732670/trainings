
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Basic Table</h2>
  <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>
  <?php

    if (isset($sMessage)) {
      ?>
    <div class="alert alert-success">
       <div>
            <?php echo $sMessage; ?>
       </div>
    </div>
      <?php
    }
  ?>
         
  <a href="/mvc_2pm" class="btn btn-primary">Back</a> 
  <br><br>  
  <form method="post">
       <div class="form-group">
            <input type="text" name="size" class="form-control">
       </div>
       <div class="form-group">
            <input type="submit" name="submit" class="form-control btn btn-primary">
       </div>
  </form>
</div>

</body>
</html>
