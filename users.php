<?php
	/*
	 * users.php
	 *
	 * Description: Lists all users and indicates admins
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
	include 'include.php';
	
	echo "<h1>Users</h1>";
	
	// Query
	$sql = "SELECT username, admin FROM user;";
	
	
	// If query is successful
	if ($res = mysqli_query($con, $sql)){

		echo "<table class='table'>";

		// Loop through all rows
		while ($row = mysqli_fetch_array($res)){
			
			$rowUsername = $row['username'];
			$rowAdmin = $row['admin'];
			if (!empty($rowUsername)){
				if ($rowAdmin){
					echo "<tr><td><b>$rowUsername</b></td></tr>";
				}
				else{
					echo "<tr><td>$rowUsername</td></tr>";
				}
			}
		}
		
		echo "</table>";
		
	}
	
	include 'footer.php';
?>