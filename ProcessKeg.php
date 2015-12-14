<?php
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
	
	if(isset($_POST['barcode'])){
		$barcode = $_POST['barcode'];
	}
	else{
		die("Barcode was not entered correctly.");
	}
	
	$sql = "INSERT INTO keg (barcode) VALUES ('$barcode')";
	mysqli_query($con,$sql) or redirect2("Error description: " . mysqli_error($con), "warning");
	
	$sql = "SELECT keg_id FROM keg ORDER BY keg_id DESC LIMIT 1;"; 
	//mysqli_query($con,$sql) or die("Error description: " . mysqli_error($con));
	
				if ($res = mysqli_query($con, $sql)){
		
		
				$row = mysqli_fetch_array($res);
			
				$keg_id = $row['keg_id'];
			
			}
		
	$sql = "INSERT INTO brew_keg (keg_id) VALUES ('$keg_id');";
	mysqli_query($con,$sql) or redirect2("Error description: " . mysqli_error($con), "warning");
	
	redirect2("Successfully added new keg: $barcode", "success");
	die();
?>