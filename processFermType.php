<?php
	$pageOptions["script"] = true;
	$pageOptions["redirectTo"] = "fermentation.php";
	
	include 'include.php';
	
	if(!empty($_POST['fermType'])){
		$fermType = $_POST['fermType'];
	} else {
		die("Fermentation Type Not Entered");
	}
	
	$sql = "INSERT INTO fermentation_type (type) VALUES ('$fermType');";
	
	mysqli_query($con, $sql) or die("Error description: " . mysqli_error($con));
	
	redirect2("Successfully Created Fermentation Type: $fermType", "success");
?>