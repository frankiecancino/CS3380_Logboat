<?php
	include 'include.php';
?>
  		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  		<link rel="stylesheet" href="/resources/demos/style.css">
  		<script>
  		$(function() {
    		$( "#datepicker" ).datepicker();
  		});
  		$(function() {
    		$( "#datepicker2" ).datepicker();
  		});
  		</script>
 
	<div class="container">
		<h3>Schedule a Brew</h3>
			<div class="row">
				<div class="col-md-1"></div>
				<form action="processbrew.php" method="POST">
					<div class="col-md-2">
						<h5>Beer Name:</h5>
					</div>
					<div class="col-md-2">
						<h5>Start Date:</h5>
					</div>
				<div class="col-md-2">
						<h5>End Date:</h5>
					</div>
				</div>
				<div class="row">
					<div class="col-md-1"></div>
					<form action="<?=$_SERVER['PHP_SELF']?>"method="POST">
						<div class="col-md-2">
							<div class="form-group">
								<select type="text" class="form-control" name="beername" required="yes">
	  								<?php
										//Query
										$sql = "SELECT * FROM beer;";
                                
                                		// If query is successful
                        				if ($res = mysqli_query($con, $sql)){
                        		
                        					// Loop through all rows
                        					while ($row = mysqli_fetch_array($res)){
                                                
                                                $rowTypeId = $row['beer_id'];
                                                $rowType = $row['beer_name'];
                                                echo "<option value='$rowTypeId'>$rowType</option>";
                        					}
                               			}
									?>
								</select>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<input type="text" class="form-control" name="startdate" id="datepicker" required="yes">
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<input type="text" class="form-control" name="enddate" id="datepicker2" required="yes">
							</div>
						</div>
						<div class="col-md-1">
							<div class="form-group">
								<input class="btn btn-info" type="submit" name="submit" value="submit" id="button"/>
							</div>
						</div>
				</form>	
		</div>
	</body>
</html>