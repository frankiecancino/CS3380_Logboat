<?php
 /*
     * kegs.php
     *
     * 
     * Authors:    Sydney Bates, Quinton Miller
     *
     */		
	 
	include 'include.php';
	
?>
<!--
<html>
	<head>
		<title>Kegs</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	</head>
	<body>
  		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  		<link rel="stylesheet" href="/resources/demos/style.css">
		<div class="container">
			<h3>Add a Keg</h3>
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-3">
					<h5>Barcode:</h5>
				</div>

			</div>
			<div class="row">
				<div class="col-md-1"></div>
				<form action="ProcessKeg.php" method="POST">
				<div class="col-md-3">
						<div class="form-group">
							<input type="text" class="form-control" name="barcode" required="yes">
						</div>
				</div>

				<div class="col-md-1">
						<div class="form-group">
							<input class="btn btn-info" type="submit" name="submit" value="submit" id="button"/>
						</div>
					</div>
				</div>
				</form>	
	-->
<div class='row'>
	<!-- Button trigger modal -->
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addKegModal">
		Add New Keg
	</button>
    <!-- Modal -->
    <div class="modal fade" id="addKegModal" tabindex="-1" role="dialog" aria-labelledby="lblModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                	<h4 class="modal-title" id="myModalLabel">Add A Keg</h4>
              	</div>
          		<div class="modal-body">
                	<form action='ProcessKeg.php' method='POST'>
                		<div class='form-group'>
                    		<label>Barcode:</label>
                        	<input type='text' name='barcode' placeholder='Barcode' class='form-control' required='yes' autofocus='yes'>
                    	</div>
      			</div>
              	<div class="modal-footer">
                	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Keg</button>
                    </form>
              	</div>
		  	</div>
    	</div>
  	</div>
</div>
<div class='row'>
	<h2>Look-Up a Keg</h2>
	<form action='kegInfo.php' method='POST'>
		<div class='form-group'>
			<label>Barcode</label>
			<input type='text' class='form-control' name='barcode' placeholder='Barcode' required='yes'>
		</div>
		<button type='submit' class='btn btn-default'>Search Keg</button>
	</form>
</div>
<!--
							
			<h3>Look-up a Keg:</h3>
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-3">
					<h5>Barcode:</h5>
				</div>

			</div>
			<div class="row">
				<div class="col-md-1"></div>
				<form action="kegInfo.php" method="POST" >
				<div class="col-md-3">
						<div class="form-group">
							<input type="text" class="form-control" name="barcode" required="yes">
						</div>
				</div>

				<div class="col-md-1">
						<div class="form-group">
							<input class="btn btn-info" type="submit" id="button"/>
						</div>
					</div>
				</div>
				</form>
-->
<?php
			//query for total kegs
			$sql = "SELECT COUNT(*) AS total FROM keg;";
			
			if ($res = mysqli_query($con, $sql)){
		
		
				$row = mysqli_fetch_array($res);
			
				$rowTotalInventory = $row['total'];
			
			}
			
			//query for empty kegs
			$sql = "SELECT COUNT(*) AS total_empty FROM brew_keg WHERE brew_id IS NULL;";
			
			if ($res = mysqli_query($con, $sql)){
		
		
				$row = mysqli_fetch_array($res);
			
				$rowTotalAvailable = $row['total_empty'];
			
			}
			
			//query for kegs filled in-house
			$sql = "SELECT COUNT(*) AS total_filled FROM brew_keg WHERE brew_id IS NOT NULL AND ship_date IS NULL;";
			
			if ($res = mysqli_query($con, $sql)){
		
		
				$row = mysqli_fetch_array($res);
			
				$rowTotalFilled = $row['total_filled'];
			
			}
			
			//query for amount of kegs shipped out
			$sql = "SELECT COUNT(*) AS total_shipped FROM brew_keg WHERE brew_id IS NOT NULL AND ship_date IS NOT NULL AND return_date IS NULL;";
			
			if ($res = mysqli_query($con, $sql)){
		
		
				$row = mysqli_fetch_array($res);
			
				$rowTotalShipped = $row['total_shipped'];
			
			}
			

			
		?>
<div class='row'>
	<h2>Keg Inventory (<?php echo $rowTotalInventory; ?>)</h2>
	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
	  <div class="panel panel-default">
	    <div class="panel-heading" role="tab" id="headingOne">
	      <h4 class="panel-title">
	        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
	        	Filled Kegs (<?php echo $rowTotalFilled; ?>)
	        </a>
	      </h4>
	    </div>
	    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
	      <div class="panel-body">
	<?php
				//Query for list of kegs filled in house
	        	$sql = "SELECT barcode, keg_id FROM brew_keg JOIN keg USING (keg_id) WHERE brew_id IS NOT NULL AND ship_date IS NULL;";
	                                        
	            // If query is successful
	            if ($res = mysqli_query($con, $sql)){
	                echo "<table class='table'>";                		
	                // Loop through all rows
	            	while ($row = mysqli_fetch_array($res)){
	                                                        
	                  	$rowBarcode = $row['barcode'];
	                   	$rowKegId = $row['keg_id'];
						                        
	                   	echo "<tr><td>$rowBarcode</td><td><a href='kegInfo.php?kegId=$rowKegId' class='btn btn-default'>Keg Info</a></td><td><a href='updateKeg.php?kegId=$rowKegId' class='btn btn-default'>Update Keg</a></td>";
						   
	                                			
					}
	        		echo "</table>";
				}	
	?>
	      </div>
	    </div>
	  </div>
	  <div class="panel panel-default">
	    <div class="panel-heading" role="tab" id="headingTwo">
	      <h4 class="panel-title">
	        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
	          Shipped Kegs (<?php echo $rowTotalShipped; ?>)
	        </a>
	      </h4>
	    </div>
	    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
	      <div class="panel-body">
	<?php
				//Query for list of kegs filled in house
	        	$sql = "SELECT barcode, keg_id FROM brew_keg JOIN keg USING (keg_id) WHERE brew_id IS NOT NULL AND ship_date IS NOT NULL AND return_date IS NULL;";
	                                        
	            // If query is successful
	            if ($res = mysqli_query($con, $sql)){
	                echo "<table class='table'>";                		
	                // Loop through all rows
	            	while ($row = mysqli_fetch_array($res)){
	                                                        
	                  	$rowBarcode = $row['barcode'];
	                   	$rowKegId = $row['keg_id'];
						                        
	                   	echo "<tr><td>$rowBarcode</td><td><a href='kegInfo.php?kegId=$rowKegId' class='btn btn-default'>Keg Info</a></td><td><a href='updateKeg.php?kegId=$rowKegId' class='btn btn-default'>Update Keg</a></td>";
						   
	                                			
					}
	        		echo "</table>";
				}	
	?>
	      </div>
	    </div>
	  </div>
	  <div class="panel panel-default">
	    <div class="panel-heading" role="tab" id="headingThree">
	      <h4 class="panel-title">
	        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
	          Available Kegs (<?php echo $rowTotalAvailable; ?>)
	        </a>
	      </h4>
	    </div>
	    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
	      <div class="panel-body">
	<?php
				//Query for list of kegs filled in house
	        	$sql = "SELECT barcode, keg_id FROM brew_keg JOIN keg USING (keg_id) WHERE brew_id IS NULL;";
	                                        
	            // If query is successful
	            if ($res = mysqli_query($con, $sql)){
	                echo "<table class='table'>";                		
	                // Loop through all rows
	            	while ($row = mysqli_fetch_array($res)){
	                                                        
	                  	$rowBarcode = $row['barcode'];
	                   	$rowKegId = $row['keg_id'];
						                        
	                   	echo "<tr><td>$rowBarcode</td><td><a href='kegInfo.php?kegId=$rowKegId' class='btn btn-default'>Keg Info</a></td><td><a href='updateKeg.php?kegId=$rowKegId' class='btn btn-default'>Update Keg</a></td>";
						   
	                                			
					}
	        		echo "</table>";
				}	
	?>
	      </div>
	    </div>
	  </div>
	</div>
</div>

<?php include 'footer.php'; ?>




