<?php
	if(!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']) {
		$url = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		header('Location: ' . $url);
		//exit;
	}
	include 'include.php';
?>

<html>
	<head>
		<title>Inventory</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		  		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  		<link rel="stylesheet" href="/resources/demos/style.css">
	</head>
	<body>
		<div class="container">
			<div class="container">
				<div class="col-md"
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-1"></div>
				<form action="<?=$_SERVER['PHP_SHELF']?>"method="POST">
					<div class="col-md-2">
						<h5>Add New Ingredient:</h5>
					</div>
					<div class="col-md-1">
						<div class="form-group">
							<input type="text" class="form-control" name="ingredient">
						</div>
					</div>
				</form>
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
				<form action="<?=$_SERVER['PHP_SELF']?>"method="POST">
					<div class="col-md-3">
						<div class="form-group">
							<input type="text" class="form-control" name="ingredient">
						</div>
					</div>
					<div class="col-md-1">
						<div class="form-group">
							<input type="text" class="form-control" name="amount">
						</div>
					</div>
					<div class="col-md-1">
						<div class="form-group">
							<input type="text" class="form-control" name="unit">
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
				</form>
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