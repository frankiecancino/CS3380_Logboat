<html>
	<head>
    	<title>Logboat Brewery</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<!-- Tab selection script -->
		<script>
			$( document ).ready(function() {
				$('a[href*="<?php echo $fileName; ?>"]').parent().addClass("active");
			});
		</script>
		<!-- End tab selection script -->
	</head>
	<body>
    	<ul class="nav nav-tabs">
			<li><a href="home.php">Home</a></li>
	        <li><a href="brew.php">Brew</a></li>
			<li><a href="kegs.php">Kegs</a></li>
			<li><a href="inventory.php">Inventory</a></li>
			<li><a href="report.php">Reports</a></li>
	        <?php if ($isAdmin) { ?>
			<li><a href='users.php'>Users</a></li>
            <li><a href='register.php'>Register</a></li>        
            <?php } ?>
        </ul>
        <br><br>
		<div class='container'>