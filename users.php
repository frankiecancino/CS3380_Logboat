<?php
	/*
	 * users.php
	 *
	 * Description: Lists all users and indicates admins
	 * Authors:     Quinton D Miller
	 *
	 */	 
	include 'include.php';
	
	echo "<h1>Users</h1><p>";
	
	// Query
	$sql = "SELECT username, admin FROM user;";
	
	
	// If query is successful
	if ($res = mysqli_query($con, $sql)){
		
		echo "<div class='col-md-3'>
				<div class='form-group'>";
		echo "<select multiple class='form-control'>";
		
		// Loop through all rows
		while ($row = mysqli_fetch_array($res)){
			
			$rowUsername = $row['username'];
			$rowAdmin = $row['admin'];
			echo "<option>";
			if ($rowAdmin){
				echo "<b>$rowUsername</b>";
			}
			else{
				echo "$rowUsername";
			}
			echo "</option>";
			
		}
		
		echo "</select>";
		
	}
	
	include 'footer.php';
?>