<?php
	/*
	 * users.php
	 *
	 * Description: Lists all users and indicates admins
	 * Authors:     Quinton D Miller
	 *
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