<?php
	if(!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']) {
		$url = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		header('Location: ' . $url);
		//exit;
	}
?>
<html>
	<head>
		<title>Reports</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	</head>
	<body>
		<ul class="nav nav-tabs">
			<li><a href="https://logboatbrewery.azurewebsites.net/home.php">Home</a></li>
			<li><a href="https://logboatbrewery.azurewebsites.net/brew.php">Brew</a></li>
			<li><a href="https://logboatbrewery.azurewebsites.net/kegs.php">Kegs</a></li>
			<li><a href="https://logboatbrewery.azurewebsites.net/inventory.php">Inventory</a></li>
			<li class="active"><a href="https://logboatbrewery.azurewebsites.net/report.php">Reports</a></li>
		</ul>
		<meta charset="utf-8">
  		<title>jQuery UI Datepicker - Default functionality</title>
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
		<script>
  		$(function() {
    		$( "#datepicker3" ).datepicker();
  		});
  		</script>
		  
		<div class="container">
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-2">
					<h5>Start Date:</h5>
				</div>
			</div>
			<div class="row">
				<div class="col-md-1"></div>
				<form action="<?=$_SERVER['PHP_SELF']?>"method="POST">
				<div class="col-md-2">
						<div class="form-group">
							<input type="text" class="form-control" name="filldate" id="datepicker">
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
