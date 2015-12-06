<?php
 /*
     * kegs.php
     *
     * 
     * Authors:    Sydney Bates, Quinton Miller
     *
     */		
	if(!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']) {
		$url = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		header('Location: ' . $url);
		//exit;
	}
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
-->
  		<script>
  		$(function() {
    		$( "#datepicker" ).datepicker();
  		});
  		</script>
		<script>
  		$(function() {
    		$( "#datepicker2" ).datepicker();
  		});
  		</script>
		<script>
  		$(function() {
    		$( "#datepicker3" ).datepicker();
  		});
  		</script>
<!--
		<div class="container">
-->
<!--			<h3>Add a Keg</h3>
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
        <div class='col-sm-6'>
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


        				</select>
                        
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
</div>

	
							
			<h3>Look-Up Keg</h3>
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-3">
					<h5>Barcode:</h5>
				</div>

			</div>
			<div class="row">
				<div class="col-md-1"></div>
				<form action="kegInfo.php" method="GET" >
				<div class="col-md-3">
						<div class="form-group">
							<input type="text" class="form-control" name="kegId" required="yes">
						</div>
				</div>

				<div class="col-md-1">
						<div class="form-group">
							<input class="btn btn-info" type="submit" id="button"/>
						</div>
					</div>
				</div>
				</form>	
				
			<h3>Keg Inventory</h3>
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
			
			//query for kegs shipped out
			$sql = "SELECT COUNT(*) AS total_shipped FROM brew_keg WHERE brew_id IS NOT NULL AND ship_date IS NOT NULL AND return_date IS NULL;";
			
			if ($res = mysqli_query($con, $sql)){
		
		
				$row = mysqli_fetch_array($res);
			
				$rowTotalShipped = $row['total_shipped'];
			
			}
			
		?>
			
			<div class="row">
				<div class="col-md-2">
					<h5>Total Kegs: </h5>
				</div>
				<div class="col-md-1">
					<h5><?php echo $rowTotalInventory; ?></h5>
				</div>

			</div>
			<div class="row">
				<div class="col-md-2">
					<h5>Kegs Filled In-House: </h5>
				</div>
				<div class="col-md-1">
					<h5><?php echo $rowTotalFilled; ?></h5>
				</div>

			</div>
			<div class="row">
				<div class="col-md-2">
					<h5>Kegs Shipped Out: </h5>
				</div>
				<div class="col-md-1">
					<h5><?php echo $rowTotalShipped; ?></h5>
				</div>

			</div>
			<div class="row">
				<div class="col-md-2">
					<h5>Kegs Available: </h5>
				</div>
				<div class="col-md-1">
					<h5><?php echo $rowTotalAvailable; ?></h5>
				</div>

			</div>
		</div>
		
		
	</body>
</html>




