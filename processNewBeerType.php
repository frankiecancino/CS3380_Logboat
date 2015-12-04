<?php
	/*
	 * processNewBeerType.php
	 *
	 * Description: Adds new beer type to database
	 * Authors:     Quinton D Miller
	 *
	 */
	$pageOptions["script"] = true;
	 
	include 'include.php';
	
	// Check post variable
	if (isset($_POST['type']) && !empty($_POST['type'])){
		
		$type = $_POST['type'];
		
	}
	else{
		
		die("Type not entered");
		
	}
	
	// Query
	$sql = "INSERT INTO beer_type (type) VALUES ('$type');";
	
	// Execute
	mysqli_query($con, $sql) or die("Error description: " . mysqli_error($con));
	
	header("Location: beerType.php");
		
	
?>