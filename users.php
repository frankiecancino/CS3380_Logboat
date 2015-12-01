<?php
	
	include 'include.php';
	
	echo "<h1>Users</h1><p>";
	
	// Query
	$sql = "SELECT username, admin FROM user;";
	
	// If query is successful
	if ($res = mysqli_query($con, $sql)){
	
		// Loop through all rows
		while ($row = mysqli_fetch_array($res)){
			
			$rowUsername = $row['username'];
			$rowAdmin = $row['admin'];
			
			if ($rowAdmin){
				echo "<b>$rowUsername</b>";
			}
			else{
				echo "$rowUsername";
			}
			echo "<br>";
			
		}
		
	}
	
	include 'footer.php';
?>