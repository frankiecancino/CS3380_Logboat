<?php
	/*
	* functions.php
	*
	* Description: Update a keg.
	* Authors:     Quinton D Miller
	*
	*/	
	
	/* 
	 * redirect
	 *
	 * Description:  Redirects user and optionally sets an alert
	 * Parameters:
	 *   redirectTo: Where user is redirected
	 *               Defaults to $pageOptions["redirectTo"]
	 *   alertType:  Type of alert {success, info, warning}
	 *   alertMsg:   Message in the alert
	 * Authors:      Quinton D Miller
	 *
	 */
	function redirect($redirectTo = null, $alertType = null, $alertMsg = null){
		
		// Get redirect location
		global $pageOptions;
		$redirectTo = $redirectTo ? $redirectTo : $pageOptions["redirectTo"];
		
		// Set alert session variables
		if ($alertType != null && $alertMsg != null){
			
			if ($alertType == "success"){
				
				$_SESSION["successMsg"] = $alertMsg;
				
			} else if ($alertType == "info"){
				
				$_SESSION["infoMsg"] = $alertMsg;
				
			} else if ($alertType == "warning"){
				
				$_SESSION["warningMsg"] = $alertMsg;
				
			} else{
				
				break;
				
			}
			
		}
		
		header("Location: $redirectTo");
		
	}
	
	/*
	 * redirect2
	 *
	 * Description: Redirect function in a different order, so that you
	 *              can input only a message.
	 * Authors:     Quinton D Miller
	 */
	function redirect2($alertMsg, $alertType = "info"){
		
		// Call function
		redirect(null, $alertType, $alertMsg);
		
	}
	
?>