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
		die();
		
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