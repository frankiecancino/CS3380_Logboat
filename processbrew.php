<?php
	$pageOptions['script']     = true;
	$pageOptions['redirectTo'] = "brew.php";
    
	include 'include.php';
	
	if (isset($_POST['beername']) && isset($_POST['startdate']) && isset($_POST['enddate'])){
        
        $beername = $_POST['beername'];
        $startdate = date("Y-m-d H:i:s", strtotime($_POST['startdate']));
		$enddate = date("Y-m-d H:i:s", strtotime($_POST['enddate']));
	
	}
	else
	{
		redirect2("Post variables not set", "warning");
	}
	
	// Query
	$sql = "INSERT INTO brew (beer_name, start_date, end_date, user) VALUES ('$beername', '$startdate', '$enddate', '$loggedInUsername');";
	mysqli_query($con,$sql) or redirect2("Error description: " . mysqli_error($con), "warning");
	
	// Execute
	//mysqli_query($con, $sql) or die("Error: " . mysqli_error($con));
	
	redirect2("$loggedInUsername successfully created $beer_name brew", "success");
	
	//header("Location: brew.php");
	
?>