<?php
	/*
	 * processNewBeer.php
	 *
	 * Description: Adds new beer to database
	 * Authors:     Quinton D Miller
	 *
	 */
	$pageOptions["script"] = true;
	 
	include 'include.php';
	
	// Check post variable
	if (!empty($_POST['name']) && !empty($_POST['type'])){
		
		$name = $_POST['name'];
		$typeId = $_POST['type'];
		
	}
	else{
		
		die("Beer name and/or type not entered");
		
	}
	
	// Query
	$sql = "INSERT INTO beer (beer_name, beer_type_id) VALUES ('$name', $typeId);";
	
	// Execute
	mysqli_query($con, $sql) or die("Error description: " . mysqli_error($con));
	
	header("Location: beer2.php");
		
	
?>