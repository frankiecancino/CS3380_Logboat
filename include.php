<?php
	/*
	 * include.php
	 *
	 * Description: Handles any pre-page processing
	 * Authors:     Quinton D Miller
	 *
	 */
	
	// Start session
	session_set_cookie_params(86400, "/");
	session_start();

	// Database connection
	include 'connect.php';
	
	/* Set Page Options */
	// Defaults
	$pageOptionsDefaults = array("loginRequired" => true
						        ,"adminRequired" => false
						        ,"script"        => false
								,"redirectTo"    => "home.php");
	
	// Set all options, that haven't already been set, to default
	foreach($pageOptionsDefaults as $entry => $defaultValue){
		if (!isset($pageOptions[$entry])) $pageOptions[$entry] = $defaultValue;
	}

	/* HTTPS Redirect */
    if (!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']) {

            $url = 'https://'.$_SERVER['HTTP_HOST'].$SERVER['REQUEST_URI'];
            header('Location: $url');
            
    }
	
	/* Variables */
	$fileName         = basename($_SERVER['PHP_SELF']);
	$loggedInUsername = isset($_SESSION['UN']) ? $_SESSION['UN'] : "";
	$isAdmin          = isset($_SESSION['admin']) ? $_SESSION['UN'] : 0;
	$isLoggedIn       = !empty($loggedInUsername);
		
	/* Login Checking */
	if ($pageOptions["loginRequired"] && !$isLoggedIn){
		
		header("Location: index.php");
		die();
		
	}
	
	/* Admin Checking */
	if ($pageOptions["adminRequired"] && !$isAdmin){
		
		header("Location: " . $pageOptions["redirectTo"]);
		die();
		
	}
	
	/* Script Checking */
	if (!$pageOptions["script"]){
		
		include 'header.php';
		
	}

?>