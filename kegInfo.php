<?php
    /*
     * kegInfo.php
     *
     * Description: Shows rentals of a keg
     * Authors:     Quinton D Miller
     *
     */		
	 
	$pageOptions["redirectTo"] = "kegs.php";
	
	include 'include.php';
	
	// Check if keg was submitted
	if (isset($_GET['kegId'])){
		
		$kegId = $_GET['kegId'];
		
	}
	else{
		
		redirect2("No Keg Id supplied", "warning");
		
	}
	
	// Query
	$sql = "SELECT * FROM brew_keg WHERE keg_id = $kegId";
	
	// If query is successful
	if ($res = mysqli_query($con, $sql)){
?>	

<div class='col-sm-6'>
	<h1>Keg Entries</h1>
	<div class="table-responsive">
		
<?php	
		// Loop through all rows
		while ($row = mysqli_fetch_array($res)){
		
			echo $row['brew_id'] . " " . $row['fill_date'] . " " . $row['ship_date'] . " " . $row['return_date'] . "<br>";
			
		}
		
	}	
	
?>