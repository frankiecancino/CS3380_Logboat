<?php
	/*
	 * processNewBeer.php
	 *
	 * Description: Adds new beer to database
	 * Authors:     Quinton D Miller
	 *
	 */
	 
	$pageOptions["script"] = true;
	$pageOptions["redirectTo"] = "beer2.php";
	
	include 'include.php';
	
	// Check post variable
	if (!empty($_POST['name']) && !empty($_POST['type'])){
		
		$name = $_POST['name'];
		$typeId = $_POST['type'];
		
	}
	else{
		
		redirect2("Beer name and/or type not entered", "warning");
		
	}
	
	// Query
	$sql = "INSERT INTO beer (beer_name, beer_type_id) VALUES ('$name', $typeId);";
	
	// Execute
	mysqli_query($con, $sql) or redirect2("Error description: " . mysqli_error($con), "warning");
	
	redirect2("Successfully added beer: $name", "success");
		
	
?>