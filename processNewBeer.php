<?php
	/*
	 * processNewBeer.php
	 *
	 * Description: Adds new beer to database
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
	 
	$pageOptions["script"] = true;
	$pageOptions["redirectTo"] = "beer2.php";
	
	include 'include.php';
	
	// Check post variable
	if (!empty($_POST['name']) && !empty($_POST['type'])){
		
		$name = $_POST['name'];
		$typeId = $_POST['type'];
		
	}
	else{
		
		redirect2("Beer name and/or type not entered", "warning");
		
	}
	
	// Query
	$sql = "INSERT INTO beer (beer_name, beer_type_id) VALUES ('$name', $typeId);";
	
	// Execute
	mysqli_query($con, $sql) or redirect2("Error description: " . mysqli_error($con), "warning");
	
	redirect2("Successfully added beer: $name", "success");
		
	
?>