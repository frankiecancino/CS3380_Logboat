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