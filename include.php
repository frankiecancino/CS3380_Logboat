<?php
		// Start session
		session_start();
	
		// Database connection
		include 'connect.php';
		
		/* Log in check */
		$exceptionUrls = array("index.php"
							  ,"VerifyLogin.php"
							  , "ProcessReg.php"); // URLs that do not need to log in check
							                       // ToDo: Remove ProcessReg.php when that's fixed
		
		// Check URL is NOT exception
		$fileName = basename($_SERVER['PHP_SELF']);
		if (in_array($fileName, $exceptionUrls) == FALSE){
			
			// Check if user is logged in
			if (!isset($_SESSION['UN'])){
				
				// Redirect
				// ToDo: Better error/redirect system
				header("Location: index.php");
				
			}
			
			// Set Username
			$loggedInUsername = $_SESSION['UN'];
			$isAdmin = $_SESSION['admin'];
				
		}
	
		/* HTTPS Redirect */
        if (!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']) {

                $url = 'https://'.$_SERVER['HTTP_HOST'].$SERVER['REQUEST_URI'];
                header('Location: ' . $url);
                
        }
		
		/* Pages that do not need header */
		$headerExceptions = array("index.php"
								 ,"VerifyLogin.php"
								 ,"ProcessReg.php");
		
		// Check URL is NOT exception					 
		if (in_array($fileName, $headerExceptions) == FALSE){
			include 'header.php';
		}
	
?>