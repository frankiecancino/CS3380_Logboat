<?php
    /*
     * kegInfo.php
     *
     * Description: Shows rentals of a keg
     * Authors:     Quinton D Miller
     *
     */	
	  /*Copyright (c) 2015 Frankie Cancino, Quinton Miller, Trent Broeker, Sydney Bates, Matt Haruza



Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:



The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.



THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.  IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
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
	else if (!empty($_GET['kegId'])){
		
		$kegId = $_GET['kegId'];
		
				
		// Query
		$sql = "SELECT barcode FROM keg WHERE keg_id = $kegId";
		
		// If query is successful
		if ($res = mysqli_query($con, $sql)){
			
			// Redirect if no entries
			if (mysqli_num_rows($res) == 0) redirect2("No entries for keg with barcode $barcode", "warning");
			
			// Get Keg Id
			$row = mysqli_fetch_array($res);
			$barcode = $row['barcode'];
			
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

<div class='col-sm-12'>
	<h1>Keg : <?php echo $barcode; ?></h1>
	<div class="table-responsive">
		<table class="table">
			<tr>
				<th>Beer Name</th>
				<th>Fill Date</th>
				<th>Ship Date</th>
				<th>Renter</th>
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
			
			$rowRenter = $row['location'] ? $row['location'] : "N/A";
			$rowFillDate = $row['fill_date'] ? $row['fill_date'] : "N/A";
			$rowShipDate = $row['ship_date'] ? $row['ship_date'] : "N/A";
			$rowReturnDate = $row['return_date'] ? $row['return_date'] : "N/A";
			
			echo "<tr><td>$rowBeerName</td><td>$rowFillDate</td><td>$rowShipDate</td><td>$rowRenter</td><td>$rowReturnDate</td><td><a href='updateKeg.php?kegId=$kegId' class='btn btn-default'>Update</a></td></tr>";
			
		}
		
	}
	else{
		
		redirect2("MySQL Error: " . mysqli_error($con) . $sql, "warning");
		
	}		
?>
		</table>
	</div>
</div>