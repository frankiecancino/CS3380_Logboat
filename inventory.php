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
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-3">
					<h5>Ingredient:</h5>
				</div>
				<div class="col-md-1">
					<h5>Amount:</h5>
				</div>
				<div class="col-md-1">
					<h5>Unit:</h5>
				</div>
				<div class="col-md-2">
					<h5>Expiration Date:</h5>
				</div>
				<div class="col-md-1">
					<h5>Lot Num:</h5>
				</div>
			</div>
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-3">
					<div class="form-group">
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
				<div class="col-md-1">
					<div class="form-group">
						<input type="number" step=".01" min="0" class="form-control" name="amount" required>
					</div>
				</div>
				<div class="col-md-1">
					<div class="form-group">
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
				<div class="col-md-2">
					<div class="form-group">
						<input type="text" class="form-control" name="expdate" id="datepicker">
					</div>
				</div>
				<div class="col-md-1">
					<div class="form-group">
						<input type="text" class="form-control" name="lotnum">
					</div>
				</div>
				<div class="col-md-1">
					<div class="form-group">
						<input class="btn btn-info" type="submit" name="submit" value="submit" id="button"/>
					</div>
				</div>
			</div>
		</div>
		<?php
			if(isset($_POST['submit'])) {
				
				($ingredient = $_POST['ingredient']) or die("Please Enter Ingredient.");
				($inamount = $_POST['amount']) or die("Please Enter Amount.");
				($unit = $_POST['unit']) or die("Please Enter Unit.");
				($expdate = $_POST['expdate']) or die("Please Enter Expiration Date.");
				($inlotnum = $_POST['lotnum']) or die("Please Enter Lot Number.");
				
				echo nl2br("Input Ingredient: " . $ingredient . "\n");
				echo nl2br("Input Amount: " . $inamount . "\n");
				echo nl2br("Input Unit: " . $unit . "\n");
				echo nl2br("Input Expiration Date: " . $expdate . "\n");
				echo nl2br("Input Lot Number: " . $inlotnum . "\n");
				
				$amount = floatval($inamount);
				settype($amount, "double");
				
				$lotnum = intval($inlotnum);
				
				if(!is_double($amount)){
					die("Enter Valid Amount. ex. 32.0");
				}
				
				if(!is_int($lotnum)){
					die("Enter Valid Lot Number. ex. 11");
				}
				
				list($month, $day, $year) = explode("/", $expdate);
				$nmonth = intval($month);
				$nday = intval($day);
				$nyear = intval($year);
				
				$cur_date = getdate();

				if(!checkdate($nmonth,$nday,$nyear)) {
					die("Enter Valid Expiration Date.");
				}
				
				if($nyear < $cur_date[year]){
					die("Cannot Enter Expired Item.");
				}
				if($nyear < $cur_date[year] and $month < $cur_date[mon]){
					die("Cannot Enter Expired Item.");
				}
				if($nyear < $cur_date[year] and $month < $cur_date[mon] and $day < $cur_date[mday]){
					die("Cannot Enter Expired Item.");
				}
				
				$link = mysqli_connect("us-cdbr-azure-central-a.cloudapp.net","bac7425156859d","ad2aa049","logboatmysqldb") or die("Connection Error ".mysqli_error($link));
				$query = "SELECT ingredient_id FROM ingredient WHERE name = ?";
				//echo "<br><br><br>" . $query;
				
				if($stmt = mysqli_prepare($link,$query)) {
					mysqli_stmt_bind_param($stmt, "s", $ingredient) or die("bind param");
					mysqli_stmt_execute($stmt);
					mysqli_stmt_bind_result($stmt,$ingredient_id);
					mysqli_stmt_fetch($stmt);
					echo nl2br("\nQuery: " . $ingredient . "\n");
					echo nl2br("Result: " . $ingredient_id . "\n");
				} else {
					die("prepare failed");
				}
				
				if($ingredient_id){
					echo nl2br("Ingredient ID Found.\n");
				} else {
					echo nl2br("Ingredient ID Not Found.\n");
				}
					
				$link = mysqli_connect("us-cdbr-azure-central-a.cloudapp.net","bac7425156859d","ad2aa049","logboatmysqldb") or die("Connection Error ".mysqli_error($link));
				$query = "SELECT unit_id FROM unit WHERE unit_type = ?";
				
				if($stmt = mysqli_prepare($link,$query)) {
					mysqli_stmt_bind_param($stmt, "s", $unit) or die("bind param1");
					mysqli_stmt_execute($stmt);
					mysqli_stmt_bind_result($stmt,$unit_id);
					mysqli_stmt_fetch($stmt);
					echo nl2br("\nQuery: " . $unit . "\n");
					echo nl2br("Result: " . $unit_id . "\n");
				} else {
					die("prepare1 failed");
				}
				
				if($unit_id) {
					echo nl2br("Unit ID  Found.\n");
				} else {
					echo nl2br("Unit ID Not Found. Creating New Unit.\n");
					$link = mysqli_connect("us-cdbr-azure-central-a.cloudapp.net","bac7425156859d","ad2aa049","logboatmysqldb") or die("Connection Error ".mysqli_error($link));
					$insert = "INSERT INTO unit (unit_type) VALUES (?)";
					
					if($stmt = mysqli_prepare($link, $insert)) {
						mysqli_stmt_bind_param($stmt, "s", $unit) or die("bind param2");
						mysqli_stmt_execute($stmt);
						echo nl2br("\nInsert: " . $unit . "\n");
					} else {
						die("prepare2 failed");
					}
					
					//echo "1";
					$link = mysqli_connect("us-cdbr-azure-central-a.cloudapp.net","bac7425156859d","ad2aa049","logboatmysqldb") or die("Connection Error ".mysqli_error($link));
					$query = "SELECT unit_id FROM unit WHERE unit_type = ?";
					if($stmt1 = mysqli_prepare($link,$query)) {
						mysqli_stmt_bind_param($stmt1, "s", $unit) or die("bind param3");
						mysqli_stmt_execute($stmt1);
						mysqli_stmt_bind_result($stmt1,$unit_id);
						mysqli_stmt_fetch($stmt1);
						echo "<br>";
						echo "Query: " . $unit;
						echo "<br>";
						echo "Result: " . $unit_id;
					} else {
						die("prepare3 failed");
					}
				}
				
				echo nl2br("\nIngredient_ID: " . $ingredient_id . "\n");
				echo nl2br("Unit_ID: " . $unit_id . "\n");
				
				$link = mysqli_connect("us-cdbr-azure-central-a.cloudapp.net","bac7425156859d","ad2aa049","logboatmysqldb") or die("Connection Error ".mysqli_error($link));
				$insert = "INSERT INTO ingredient (name, amount) VALUES (?,?)";
				
				if($stmt = mysqli_prepare($link, $insert)) {
					$indate = $year . $month . $day;
					$date = intval($indate);
					$username = "admin";
					echo nl2br("\nIngredient: " . $ingredient . "\n");
					echo nl2br("Ingredient_ID: " . $ingredient_id . "\n");
					echo nl2br("Amount: " . $amount . "\n");
					echo nl2br("Unit: " . $unit . "\n");
					echo nl2br("Unit_ID: " . $unit_id . "\n");
					echo nl2br("Expiration Date: " . $date . "\n");
					echo nl2br("Lot Number: " . $lotnum . "\n");
					echo nl2br("User: " . $username . "\n");
					mysqli_stmt_bind_param($stmt, "sd", $ingredient, $amount) or die("bind param4");
					mysqil_stmt_execute($stmt);
					echo nl2br("\nInsert: " . $ingredient . "\n");
				} else {
					die("prepare4 failed");
				}
			}
		?>
	</body>
</html>