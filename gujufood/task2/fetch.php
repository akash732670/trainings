<?php
	$conn = mysqli_connect("localhost","root","","crud_mvc");

		$query = "SELECT * FROM users";

		$result = mysqli_query($conn, $query);

		
?>
<table class="table table-bordered">
    <thead>
      <tr>
        <th>Sl.No</th>
        <th>Name</th>
        <th>Image</th>
        <th>Created At</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    	<?php
    	if ($result->num_rows==0) {
    		$resultData = "No Record Found";
    		echo "<td colspan='5' style='text-align:center; color:red;'>".$resultData."</td>";	
    	} else {


    	$slNo = 1;
    	while ($response = mysqli_fetch_assoc($result)) {	
    	?>
      <tr>
      	<td><?php echo $slNo++; ?></td>
      	<td><?php echo $response['name']; ?></td>
        <td><img src="uploads/<?php echo $response['image'] ?>" width="100" height="100"></td>
      	<td><?php echo $response['created_at']; ?></td>
      	<td><button class="btn btn-primary edit" value="<?php echo $response['id']; ?>">Edit</button> || <button class="btn btn-danger delete" value="<?php echo $response['id']; ?>">Delete</button></td>
      </tr>
      <?php
      	}
      }
      ?>
    </tbody>
  </table>