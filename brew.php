<?php
	include 'include.php';
?>
  		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  		<script>
  		$(function() {
    		$( "#datepicker" ).datepicker();
  		});
  		$(function() {
    		$( "#datepicker2" ).datepicker();
  		});
  		</script>
		  
	<div class='row'>
        <div class='col-sm-6'>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addBrewModal">
                  Schedule Brew
                </button>
                <!-- Modal -->
                <div class="modal fade" id="addBrewModal" tabindex="-1" role="dialog" aria-labelledby="lblModal">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Schedule a Brew</h4>
                      </div>
                      <div class="modal-body">
                        <form action='processbrew.php' method='POST'>
                                <div class="form-group">
									<label>Beer Name</label>
								<select type="text" class="form-control" name="beername" required>
	  								<?php
										//Query
										$sql = "SELECT * FROM beer;";
                                
                                		// If query is successful
                        				if ($res = mysqli_query($con, $sql)){
                        		
                        					// Loop through all rows
                        					while ($row = mysqli_fetch_array($res)){
                                                
                                                $rowTypeId = $row['beer_id'];
                                                $rowType = $row['beer_name'];
                                                echo "<option value='$rowType'>$rowType</option>";
                        					}
                               			}
									?>
								</select>
							</div>
                        	<div class='form-group'>
                                <label>Start Date</label>
        						<div class="form-group">
									<input type="text" class="form-control" name="startdate" id="datepicker" required>
								</div>
                        	</div>
							<div class="form-group">
								<label>End Date</label>
								<div class="form-group">
									<input type="text" class="form-control" name="enddate" id="datepicker2" required>
								</div>
							</div>
                      	<div class="modal-footer">
                        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        	<button type="submit" class="btn btn-primary">Schedule</button>
                        	</form>
	                    </div>
	                </div>
	            </div>
	        </div>
        </div>
	</div>
</div>
<br>
		
		
<div class='row'>
	<div class='col-sm-8'>
		<h1>Brews</h1>
        <div class='table-responsive'>
        	<table class='table'>
            	<tr>
	                <th>ID</th>
	                <th>Name</th>
	                <th>Start Date</th>
					<th>End Date</th>
					<th>Username</th>
	        	</tr> 

<?php
        
    // Query
    $sql = "SELECT * FROM brew ORDER BY end_date ASC, start_date ASC, beer_name ASC;";
    
    // If query is successful
	if ($res = mysqli_query($con, $sql))
	{	
		$count = 0;
		
		// Loop through all rows
		while ($row = mysqli_fetch_array($res))
		{	
			$rowId = $row['brew_id'];
			$rowName = $row['beer_name'];
			$rowStart = $row['start_date'];
			$rowEnd = $row['end_date'];
			$rowUser = $row['user'];
		
            echo "<tr><td>$rowId</td><td>$rowName</td><td>$rowStart</td><td>$rowEnd</td><td>$rowUser</td></tr>";
			$count++;
		}   
	}
        
echo "</table></div></div></div>";
echo "<br><p class='text-center'>Total brews: $count</p><br>";
include 'footer.php';        
?>