<div class="main">
 <div class="container" style="margin-top: 50px;">
 <div class="col-sm-10">
 	<h1>Manage Brand</h1>
			<table id="example" class="table table-striped table-bordered" style="width:50%;">
				<thead>
					<tr>
						<th>#</th>
						<th>Category Name</th>	
						<th>Descrition</th>
						<th>Date</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$cout=1;
				     include_once 'config.php';
				      $qry="select *from category_tb";
				      $rs=mysqli_query($conn,$qry);
				      $count=mysqli_num_rows($rs);
				  //$rec=mysql_fetch_object($rs);
				      if ($count<=0) {
				      ?>
				      	<td>Data Not Found</td>
				      <?php
				      }
				      else{
				      while ($rec=mysqli_fetch_assoc($rs)) {
				    ?>
				    <tr>
				    	<td><?php echo $cout++ ;?></td>
				    	<td><?php echo $rec["Cat_name"]?></td>
				    	<td><?php echo $rec["Description"] ?></td>
				    	<td><?php echo $up= $rec["updated_at"]; ?></td>
				    	<td><a href="cat_edit.php?id=<?php echo $rec["id"];?>"><i class="fa fa-edit" >Edit</i></a>/
							<a href="admin-managebrand.php?dele=<?php echo $rec["id"];?>"><i class="fa fa-close">Delete</i></a></td>
				    </tr>
				<?php } } ?>
				</tbody>
			</table>
</div>
</div>
</div>