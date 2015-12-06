<?php
	/*
	 * header.php
	 *
	 * Description: Contains content that goes at beginning of each page
	 * Authors:     Quinton D Miller
	 *
	 */	
?>

<!DOCTYPE html>
<html lang="en">
	<head>
    	<title>Logboat Brewery</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<!-- Tab selection script -->
		<script>
			$( document ).ready(function() {
				$('a[href*="<?php echo $fileName; ?>"]').parent().addClass("active");
				$('.dropdown > .dropdown-menu > .active > a[href*="<?php echo $fileName; ?>"]').parent().parent().parent().addClass('active');
			});
		</script>
		<!-- End tab selection script -->
	</head>
	<body>
		<nav class="navbar navbar-default navbar-static-top">
			<div class='container'>
				<div class='navbar-header'>
			          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						  <span class="sr-only">Toggle navigation</span>
            			  <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand" href="home.php">Logboat</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
				        <li><a href="brew.php">Brew</a></li>
						<li><a href="kegs.php">Kegs</a></li>
						<li><a href="inventory.php">Inventory</a></li>
						<li><a href="report.php">Reports</a></li>
						<li class='dropdown'>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Beer <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href='beer2.php'>Beers</a></li>
								<li><a href='beerType.php'>Beer Types</a></li>
							</ul>
						</li>
						<li><a href="fermentation.php">Fermentation</a></li>
						<li><a href="brew_tracking.php">Brew Tracking</a></li>
				        <?php if ($isAdmin) { ?>
						<li class='dropdown'>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Users <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href='users.php'>User List</a></li>
								<li><a href='register.php'>Add Users</a></li>
							</ul>
						</li>
						<li><a href="recipes.php">Recipes</a></li>     
			            <?php } ?>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<p class="navbar-text"><?php echo $loggedInUsername; ?></p>
						<li><button type="button" class="btn btn-default navbar-btn" onclick="location.href = 'logout.php';">Logout</button></li>
          			</ul>
				</div>
			</div>
		</nav>
		<!--
    	<ul class="nav nav-tabs">
			<li><a href="home.php">Home</a></li>
	        <li><a href="brew.php">Brew</a></li>
			<li><a href="kegs.php">Kegs</a></li>
			<li><a href="inventory.php">Inventory</a></li>
			<li><a href="report.php">Reports</a></li>
			<li><a href='beer2.php'>Beers</a></li>
	        <?php if ($isAdmin) { ?>
			<li><a href='beerType.php'>Beer Types</a></li>
			<li><a href="recipes.php">Recipes</a></li>
			<li><a href='users.php'>Users</a></li>
            <li><a href='register.php'>Register</a></li>        
            <?php } ?>
			<li><a href='logout.php' class="bg-primary">Log Out</a></li>
        </ul>
		-->
		<div class='container' style='margin-top: 10px;'>
<?php
	
	/* Get Alert Variables */
	$isAlert = true;
	if (!empty($_SESSION['successMsg'])){
		
		$alertClass = "success";
		$alertMsg = $_SESSION['successMsg'];
		$_SESSION['successMsg'] = "";
		
	} else if (!empty($_SESSION['infoMsg'])){
		
		$alertClass = "info";
		$alertMsg = $_SESSION['infoMsg'];
		$_SESSION['infoMsg'] = "";
		
	} else if (!empty($_SESSION['warningMsg'])){
		
		$alertClass = "danger";
		$alertMsg = $_SESSION['warningMsg'];
		$_SESSION['warningMsg'] = "";
		
	} else{
		
		$isAlert = false;
		
	}
	
	/* Alerts */
	if ($isAlert){
?>
		<div class="alert alert-<?php echo $alertClass; ?> alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  <?php echo $alertMsg; ?>
		</div>
<?php 
        } 
?>