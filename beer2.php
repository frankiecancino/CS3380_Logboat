<?php
        /*
         * beer2.php
         *
         * Description: Allows entry of new beers. Displays beers.
         * Authors:     Quinton D Miller
         *
         */	
        include 'include.php';
        
        if ($isAdmin){
?>
                
<div class='row'>
        <div class='col-sm-6'>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addBeerModal">
                  Add Beer
                </button>
                <!-- Modal -->
                <div class="modal fade" id="addBeerModal" tabindex="-1" role="dialog" aria-labelledby="lblModal">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add Beer</h4>
                      </div>
                      <div class="modal-body">
                        <form action='processNewBeer.php' method='POST'>
                                <div class='form-group'>
                                        <label>Beer Name</label>
                                        <input type='text' name='name' placeholder='Name' class='form-control' required='yes' autofocus='yes'>
                                </div>
                                <div class='form-group'>
                                        <label>Beer Type</label>
        				<select name='type' class='form-control'>
        				<?php
                                                
        				//Query
        				$sql = "SELECT * FROM beer_type ORDER BY type;";
                                        
                                        // If query is successful
                                	if ($res = mysqli_query($con, $sql)){
                                		
                                		// Loop through all rows
                                		while ($row = mysqli_fetch_array($res)){
                                                        
                                                        $rowTypeId = $row['type_id'];
                                                        $rowType = $row['type'];
                                                        
                                                        echo "<option value='$rowTypeId'>$rowType</option>";
                                			
                                		}
        
                                       }	
        					
        				?>	
        				</select>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Beer</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
        </div>
</div>
<?php } ?>
<div class='row'>
        <div class='col-sm-6'>
        	<h1>Beers</h1>
                <div class='table-responsive'>
                        <table class='table'>
                                <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Type</th>
                                </tr> 

<?php
        
        // Query
        $sql = "SELECT * FROM beer JOIN beer_type ON beer.beer_type_id=beer_type.type_id;";
        
        // If query is successful
	if ($res = mysqli_query($con, $sql)){
		
		// Loop through all rows
		while ($row = mysqli_fetch_array($res)){
			
			$rowBeerName = $row['beer_name'];
			$rowBeerId = $row['beer_id'];
                        $rowBeerType = $row['type'];
			
                        echo "<tr><td>$rowBeerId</td><td>$rowBeerName</td><td>$rowBeerType</td></tr>";
			
		}
                
	}
        
        
        echo "</table></div></div></div>";
        include 'footer.php';        
?>