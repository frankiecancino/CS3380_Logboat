<?php
	
	include 'include.php';
	
	if(isset($_POST['beername'])){
		$beername = $_POST['beername'];
	}
	else{
		die("Beer name was not entered correctly.");
	}
	
	if(isset($_POST['startdate'])){
		$startdate = $_POST['startdate'];
	}
	else{
		die("The start date was not entered correctly.");
	}
	
	if(isset($_POST['enddate'])){
		$enddate = $_POST['enddate'];
	}
	else{
		die("The end date was not entered correctly.");
	}
	
	$sql = "INSERT INTO brew (beer_name) VALUES ('$beername')";
	mysqli_query($con,$sql) or die("Error description: " . mysqli_error($con));
	
?>