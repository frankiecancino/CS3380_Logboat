<?php

	include 'include.php';
	
	// Unset all session variables
	session_unset();
	
	// Redirect
	header("Location: index.php"); // ToDo: Better redirects	

?>