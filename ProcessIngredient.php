<?php
	$pageOptions["script"] = true;
	$pageOptions["redirectTo"] = "inventory.php";
	
	include 'include.php';
	
	if(!empty($_POST['name'])){
		$name = $_POST['name'];
	} else {
		die("Ingredient Name Not Entered");
	}
	
	$sql = "INSERT INTO ingredient (ingredient_name) VALUES ('$name');";
	
	mysqli_query($con, $sql) or die("Error description: " . mysqli_error($con));
	
	redirect2("Successfully Added Ingredient: $name", "success");
?>