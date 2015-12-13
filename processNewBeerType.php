<?php
	/*
	 * processNewBeerType.php
	 *
	 * Description: Adds new beer type to database
	 * Authors:     Quinton D Miller
	 *
	 */
	$pageOptions["script"] = true;
	$pageOptions["redirectTo"] = "beerType.php";
	include 'include.php';
	
	// Check post variable
	if (isset($_POST['type']) && !empty($_POST['type'])){
		
		$type = $_POST['type'];
		
	}
	else{
		
		redirect2("Type not entered", "warning");
		
	}
	
	// Query
	$sql = "INSERT INTO beer_type (type) VALUES ('$type');";
	
	// Execute
	mysqli_query($con, $sql) or redirect2("Error description: " . mysqli_error($con), "warning");
	
	redirect2("Successfully added beer type: $type", "success");
		
	
?>