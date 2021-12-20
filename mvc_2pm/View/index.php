
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
  <a href="add" class="btn btn-primary">Add New</a> 
  <br><br>  
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Sl.No</th>
        <th>Size</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    	<?php
            if(sizeof($result)<1) {

                ?>
                    <tr>
                        <th colspan="3" class="text-center text-danger">No Record Found</th>
                    </tr>
                <?php
            } else {
    		foreach ($result as $key => $value) {
    	?>

      <tr>
        <td><?php echo ++$key; ?></td>
        <td><?php echo $value['size'];  ?></td>
        <td>
        	<a href="edit?id=<?php echo $value['id'];?>" class="btn btn-primary">Edit</a>
        	<?php
        		if ($value['status']==1) {
        			$id = $value['id'];
        			$status = $value['status'];
        			echo "<a href=status?id=$id&&cstatus=$status class='btn btn-success'>Active</a>";
        		} else {
        			echo "<a href=status?id=$id&&cstatus=$status class='btn btn-warning'>Disabled</a>";
        		}
        	?>
        	
        	<a href="delete?id=<?php echo $value['id'];?>" class="btn btn-danger">Delete</a>
        </td>
      </tr>
      <?php
    		}
        }
    	?>
    </tbody>
  </table>
</div>

</body>
</html>
