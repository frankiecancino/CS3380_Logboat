<?php
	/*
	 * include.php
	 *
	 * Description: Handles any pre-page processing
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
	// Start Output Buffer
	ob_start();
	
	// Start session
	session_set_cookie_params(86400, "/");
	session_start();

	// Database connection
	include 'connect.php';
	
	// Functions
	include 'functions.php';
	
	/* Set Page Options */
	// Defaults
	$pageOptionsDefaults = array("loginRequired" => true
						        ,"adminRequired" => false
						        ,"script"        => false
								,"title"         => ""
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
	$isAdmin          = isset($_SESSION['admin']) ? $_SESSION['admin'] : 0;
	$isLoggedIn       = !empty($loggedInUsername);
		
	/* Login Checking */
	if ($pageOptions["loginRequired"] && !$isLoggedIn){
		
		redirect("index.php");
		die();
		
	}
	
	/* Admin Checking */
	if ($pageOptions["adminRequired"] && !$isAdmin){
		
		redirect2("Error: You must be an adming to access $fileName", "warning");
		die();
		
	}
	
	/* Script Checking */
	if (!$pageOptions["script"]){
		
		include 'header.php';
		
	}

?>