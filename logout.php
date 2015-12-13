<?php

	$pageOptions["script"] = true;

	include 'include.php';
	
	// Unset all session variables
	session_unset();
	
	// Redirect
	redirect("index.php");

?>