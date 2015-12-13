<?php
	$pageOptions["script"] = true;
	$pageOptions["redirectTo"] = "recipes.php";
	
	include 'include.php';
	
	// Check post variable
	if (isset($_POST['beername']) && !empty($_POST['beername'])){
		$beername = $_POST['beername'];
	}
	else{
		die("Name of beer not entered.");
	}
	
	if (isset($_POST['ingredient']) && !empty($_POST['ingredient'])){
		$ingredient = $_POST['ingredient'];
	}
	else{
		die("Ingredient not entered.");
	}
	
	if (isset($_POST['unit']) && !empty($_POST['unit'])){
		$unit = $_POST['unit'];
	}
	else{
		die("Unit not entered.");
	}
	
	if (isset($_POST['amount']) && !empty($_POST['amount'])){
		$amount = $_POST['amount'];
	}
	else{
		die("Amount not entered.");
	}
	
	// Query
	$sql = "INSERT INTO recipe (name, amount, ingredient_name, unit_name) VALUES ('$beername', '$amount', '$ingredient', '$unit');";
	
	// Execute
	mysqli_query($con, $sql) or die("Error: " . mysqli_error($con));
	
	redirect2("Successfully Added an Ingredient to $beername", "success");
	
	//header("Location: recipes.php");
?>