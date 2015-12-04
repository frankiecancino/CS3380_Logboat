<?php
    /*
     * kegInfo.php
     *
     * Description: Shows rentals of a keg
     * Authors:     Quinton D Miller
     *
     */		
	 
	include 'include.php';
	
	// Check if keg was submitted
	if (isset($_GET['kegId'])){
		
		$kegId = $_GET['kegId'];
		
	}
	else{
		
		die("No Keg Id supplied");
		
	}
	
	// Query
	$sql = "SELECT * FROM brew_keg WHERE keg_id = $kegId";
	
	// If query is successful
	if ($res = mysqli_query($con, $sql)){
	
		// Loop through all rows
		while ($row = mysqli_fetch_array($res)){
		
			echo $row['brew_id'] . " " . $row['fill_date'] . " " . $row['ship_date'] . " " . $row['return_date'] . "<br>";
			
		}
		
	}	
	
?>