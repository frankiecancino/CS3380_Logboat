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
	if (!empty($_POST['barcode'])){
		
		$barcode = $_POST['barcode'];
		
		// Query
		$sql = "SELECT keg_id FROM keg WHERE barcode = '$barcode'";
		
		// If query is successful
		if ($res = mysqli_query($con, $sql)){
			
			// Redirect if no entries
			if (mysqli_num_rows($res) == 0) redirect2("No entries for keg with barcode $barcode", "warning");
			
			// Get Keg Id
			$row = mysqli_fetch_array($res);
			$kegId = $row['keg_id'];
			
		}
		else{
			
			redirect2("MySQL Error: " . mysqli_error($con), "warning");
			
		}
		
	}
	else{
		
		redirect2("No Keg Id supplied", "warning");
		
	}
	
	// Query
	$sql = "SELECT * FROM brew_keg WHERE keg_id = $kegId ORDER BY fill_date DESC";
	
	// If query is successful
	if ($res = mysqli_query($con, $sql)){
		
		// Redirect if no entries
		if (mysqli_num_rows($res) == 0) redirect2("No entries for keg $kegId", "warning");
?>	

<div class='col-sm-6'>
	<h1>Keg : <?php echo $barcode; ?></h1>
	<div class="table-responsive">
		<table class="table">
			<tr>
				<th>Beer Name</th>
				<th>Fill Date</th>
				<th>Ship Date</th>
				<th>Return Date</th>
				<th>Update</th>
			</tr>
<?php	
		// Loop through all rows
		while ($row = mysqli_fetch_array($res)){
			
			
			$rowBeerId = $row['brew_id'] ? $row['brew_id'] : false;
			$rowBeerName = "N/A";
			
			if ($rowBeerId != false){
				$sql2 = "SELECT beer_name FROM brew WHERE brew_id = $rowBeerId";
				if ($res2 = mysqli_query($con, $sql2)){
					$row2 = mysqli_fetch_array($res2);
					$rowBeerName = $row2['beer_name'];
				}
			}
			
			$rowFillDate = $row['fill_date'] ? $row['fill_date'] : "N/A";
			$rowShipDate = $row['ship_date'] ? $row['ship_date'] : "N/A";
			$rowReturnDate = $row['return_date'] ? $row['return_date'] : "N/A";
			
			echo "<tr><td>$rowBeerName</td><td>$rowFillDate</td><td>$rowShipDate</td><td>$rowReturnDate</td><td><a href='updateKeg.php?kegId=$kegId' class='btn btn-default'>Update</a></td></tr>";
			
		}
		
	}
	else{
		
		redirect2("MySQL Error: " . mysqli_error($con) . $sql, "warning");
		
	}		
?>
		</table>
	</div>
</div>