<?php
	if(!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']) {
		$url = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		header('Location: ' . $url);
		//exit;
	}
	include 'include.php';
?>
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addIngModal">
						Add New Ingredient
					</button>
					<div class="modal fade" id="addIngModal" tabindex="-1" role="dialog" aria-labelledby="lblModal">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">Add an Ingredient</h4>
								</div>
								<div class="modal-body">
									<form action='ProcessIngredient.php' method='POST'>
										<div class='form-group'>
											<label>Ingredient</label>
											<input type='text' name='name' placeholder='Name' class='form-control' required='yes' autofocus='yes'>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											<button type="submit" class="btn btn-primary">Add Ingredient</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row top-buffer">
				<div class="col-sm-6">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUnitModal">
						Add New Unit
					</button>
					<div class="modal fade" id="addUnitModal" tabindex="-1" role="dialog" aria-labelledby="lblModal">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">Add a Unit</h4>
								</div>
								<div class="modal-body">
									<form action='ProcessUnit.php' method='POST'>
										<div class='form-group'>
											<label>Unit</label>
											<input type='text' name='name' placeholder='Name' class='form-control' required='yes' autofocus='yes'>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											<button type="submit" class="btn btn-primary">Add Unit</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
				<div class="row top-buffer">
					<div class="col-xs-12 col-md-3">
						<div class="form-group">
							<label>Ingredient:</label>
							<select type="text" class="form-control" name="ingredient">
								<?php
									$sql = "SELECT * FROM ingredient;";
								
									if($res = mysqli_query($con, $sql)){
										while($row = mysqli_fetch_array($res)){
											$rowIng = $row['ingredient_name'];
											echo "<option value='$rowIng'>$rowIng</option>";
										}
									}
								?>
							</select>
						</div>
					</div>
					<div class="col-xs-12 col-md-2">
						<div class="form-group">
							<label>Amount:</label>
							<input type="number" step=".01" min="0" class="form-control" name="amount" required>
						</div>
					</div>
					<div class="col-xs-12 col-md-1">
						<div class="form-group">
							<label>Unit:</label>
							<select class="form-control" name="unit" required>
								<?php
									$sql = "SELECT * FROM unit;";
                                
                        			if ($res = mysqli_query($con, $sql)){
                        				while ($row = mysqli_fetch_array($res)){
                                        	$rowTypeId = $row['unit_id'];
                                        	$rowType = $row['unit_type'];
                                        	echo "<option value='$rowType'>$rowType</option>";
                        				}
                           			}	
								?>
							</select>
						</div>
					</div>
					<script>
  					$(function() {
   						$( "#datepicker" ).datepicker();
  					});
  					</script>
					<div class="col-xs-12 col-md-2">
						<div class="form-group">
							<label>Expiration Date:</label>
							<input type="text" class="form-control" name="expdate" id="datepicker">
						</div>
					</div>
					<div class="col-xs-12 col-md-1">
						<div class="form-group">
							<label>Lot Num:</label>
							<input type="text" class="form-control" name="lotnum">
						</div>
					</div>
					<div class="col-xs-12 col-md-1 top-buffer2">
						<div class="form-group">
							<input class="btn btn-info" type="submit" name="submit" value="submit" id="button"/>
						</div>
					</div>
				</div>
			</form>
		</div>
		
		<?php
			
			if(isset($_POST['submit'])) {

				if(!empty($_POST['ingredient'])){
					$ingredient = $_POST['ingredient'];
				} else {
					die("Please Enter Ingredient.");
				}
				if(!empty($_POST['amount'])){
					$amount = $_POST['amount'];
				}
				else {
					die("Please Enter Amount.");
				}
				if(!empty($_POST['unit'])){
					$unit = $_POST['unit'];
				} else {
					die("Please Enter Unit.");
				}
				if(!empty($_POST['expdate'])){
					$expdate = $_POST['expdate'];
				}
				else {
					die("Please Enter Expiration Date.");
				}
				if(!empty($_POST['lotnum'])){
					$lotnum = $_POST['lotnum'];
				}
				else {
					die("Please Enter Lot Number.");
				}
				
				list($month, $day, $year) = explode("/", $expdate);
				$nmonth = intval($month);
				$nday = intval($day);
				$nyear = intval($year);
				
				$cur_date = getdate();
				
				if($nyear < $cur_date[year]){
					die("Cannot Enter Expired Item.");
				}
				if($nyear <= $cur_date[year] and $month < $cur_date[mon]){
					die("Cannot Enter Expired Item.");
				}
				if($nyear <= $cur_date[year] and $month <= $cur_date[mon] and $day < $cur_date[mday]){
					die("Cannot Enter Expired Item.");
				}
				
				$query = "SELECT ingredient_id FROM ingredient WHERE ingredient_name = '$ingredient'";
				
				if($res = mysqli_query($con, $query)){
					$row = mysqli_fetch_array($res);
					$ingredient_id = $row['ingredient_id'];
				}
				
				$query = "SELECT unit_id FROM unit WHERE unit_type = '$unit'";
				
				if($res = mysqli_query($con, $query)){
					$row = mysqli_fetch_array($res);
					$unit_id = $row['unit_id'];
				}
				
				$indate = $year . $month . $day;
				$date = intval($indate);
				
				$query = "INSERT INTO inventory (ingredient_id, amount, unit_id, exp_date, lot_num) VALUES ('$ingredient_id','$amount','$unit_id','$date','$lotnum');";
				
				mysqli_query($con, $query) or die("Error Description: " . mysqli_error($con));	
			}
		?>
		
		<div class='row'>
			<h1>Inventory</h1>
			<div class='table-responsive'>
				<table class='table'>
					<tr>
						<th>Ingredient</th>
						<th>Amount</th>
						<th>Unit</th>
						<th>Expiration Date</th>
						<th>Lot Number</th>
						<th>Time Stamp</th>
					</tr>
		<?php
			$sql = "SELECT * FROM inventory";
			
			if($res = mysqli_query($con,$sql)) {
				$count = 0;
				
				while($row = mysqli_fetch_array($res)) {
					$rowIngId = $row['ingredient_id'];
					$rowAmount = $row['amount'];
					$rowUnitId = $row['unit_id'];
					$rowExpDate = $row['exp_date'];
					$rowLotNum = $row['lot_num'];
					$rowTime = $row['time_stamp'];
					
					$sql1 = "SELECT ingredient_name FROM ingredient WHERE ingredient_id = '$rowIngId'";
					$sql2 = "SELECT unit_type FROM unit WHERE unit_id = '$rowUnitId'";
					
					$res1 = mysqli_query($con,$sql1);
					$res2 = mysqli_query($con,$sql2);
					
					$row1 = mysqli_fetch_array($res1);
					$row2 = mysqli_fetch_array($res2);
					
					$rowIng = $row1['ingredient_name'];
					$rowUnit = $row2['unit_type'];
					
					echo "<tr><td>$rowIng</td><td>$rowAmount</td><td>$rowUnit</td><td>$rowExpDate</td><td>$rowLotNum</td><td>$rowTime</td></tr>";
					$count++;
				}
			}
			
			echo "</table></div></div></div>";
			include 'footer.php';
		?>