<?php
	if(!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']) {
		$url = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		header('Location: ' . $url);
		//exit;
	}
?>

<html>
	<head>
		<title>Brew</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		
		<style>
			select {
   				height: 2.5em;
				border-radius: 4px;
				border-color: lightgray;
				color: gray;
			}
		</style>
		
	</head>
	<body>
		<ul class="nav nav-tabs">
			<li><a href="https://logboatbrewery.azurewebsites.net/home.php">Home</a></li>
			<li class="active"><a href="https://logboatbrewery.azurewebsites.net/brew.php">Brew</a></li>
			<li><a href="https://logboatbrewery.azurewebsites.net/kegs.php">Kegs</a></li>
			<li><a href="https://logboatbrewery.azurewebsites.net/inventory.php">Inventory</a></li>
			<li><a href="https://logboatbrewery.azurewebsites.net/report.php">Reports</a></li>
		</ul>
  		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  		<link rel="stylesheet" href="/resources/demos/style.css">
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
 
	<div class="container">
			<div class="row">
				<div class="col-md-1"></div>
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
							<select>
  								<option value="shiphead">Shiphead</option>
  								<option value="mamoot">Mamoot</option>
  								<option value="snapper">Snapper</option>
  								<option value="lookout">Lookout</option>
								<option value="bearhair">Bear Hair</option>
								<option value="mocha">Mocha</option>
								<option value="jupitersmoons">Jupiter's Moons</option>
							</select>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<input type="text" class="form-control" name="startdate" id="datepicker">
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<input type="text" class="form-control" name="enddate" id="datepicker2">
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