<?php
	$pageOptions["redirectTo"] = "home.php";
	
	include 'include.php';
		
	// Query
	$sql = "SELECT * FROM brew WHERE start_date IS NOT NULL AND end_date IS NOT NULL";
	
	// Execute query and loop through results
	if ($res = mysqli_query($sql)){
		
		while ($row = mysqli_fetch_array($res)){
			
			$rowBeerName = $row['beer_name'];
			$rowStartDate = date('Y, m, d, G, i', strtotime($row['start_date']));
			$rowEndDate = date('Y, m, d, G, i', strtotime($row['end_date']));
			
			echo "{title: '$rowBeerName', start: new Date($rowStartDate), end: new Date($rowEndDate)},";
			
		}
		
	}
	else{
		
		die("Error with query: $sql");
		
	}	
?>