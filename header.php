<?php
	 /*Copyright (c) 2015 Frankie Cancino, Quinton Miller, Trent Broeker, Sydney Bates, Matt Haruza



Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:



The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.



THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.  IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
*/
?>

<!DOCTYPE html>
<html lang="en">
	<head>
    	<title>Logboat Brewery</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="/css/bootstrap-datetimepicker.min.css">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.5.0/fullcalendar.min.css">
		<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.js'></script>
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<script src="/js/bootstrap-datetimepicker.js"></script>
		<script src='//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.5.0/fullcalendar.min.js'></script>
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
						<li class='dropdown'>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Brew <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="brew.php">Brews</a></li>
								<li><a href='brewCalendar.php'>Calendar View</a></li>
								<li><a href="brew_tracking.php">Tracking</a></li>
							</ul>
						</li>
						<li class='dropdown'>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Inventory <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="inventory.php">Ingredients</a></li>
								<li><a href='kegs.php'>Kegs</a></li>
								<li><a href="report.php">Reports</a></li>
							</ul>
						</li>
						<li class='dropdown'>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Beer <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href='beer2.php'>Beers</a></li>
								<li><a href='beerType.php'>Beer Types</a></li>
							</ul>
						</li>
						<li><a href="fermentation.php">Fermentation</a></li>
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