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