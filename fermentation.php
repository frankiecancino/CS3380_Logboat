<?php
	include 'include.php';
	
	if ($isAdmin){
?>

<div class="row">
	<div class="col-sm-12">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addFermTypeModal">
			Create Measurement Type
		</button>
		<div class="modal fade" id="addFermTypeModal" tabindex="-1" role="dialog" aria-labelledby="lblModal">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Create Measurement Type</h4>
					</div>
					<div class="modal-body">
						<form action='processFermType.php' method='POST'>
							<div class='form-group'>
								<label>Measurement</label>
								<input type='text' name='fermType' placeholder='Type of measurement' class='form-control' required autofocus>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Add Measurement Type</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>

<br>
<div class='row'>
	<div class='col-sm-4'>
		<h1>Measurement Types</h1>
        <div class='table-responsive'>
        	<table class='table'>
            	<tr>
	                <th>ID</th>
	                <th>Measurement Type</th>
	        	</tr> 

<?php
        
    // Query
    $sql = "SELECT * FROM fermentation_type;";
    
    // If query is successful
	if ($res = mysqli_query($con, $sql))
	{	
		$count = 0;
		
		// Loop through all rows
		while ($row = mysqli_fetch_array($res))
		{	
			$rowId = $row['type_id'];
			$rowName = $row['type'];
		
            echo "<tr><td>$rowId</td><td>$rowName</td></tr>";
			$count++;
		}   
	}
        
echo "</table></div></div></div>";
include 'footer.php';        
?>