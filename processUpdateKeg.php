<?php
    /*
    * processUpdateKeg.php
    *
    * Description: Handles processing of updating kegs.
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

    // Page Options
	$pageOptions['script']     = true;
	$pageOptions['redirectTo'] = "kegs.php";
    
	include 'include.php';	
	
	/* Check POST variables */
	// Filling (0):   rowId, datetime, brewId
    // Shipping (1):  rowId, datetime, location
	// Returning (2): rowId, datetime, kegId
    if (isset($_POST['rowId']) && isset($_POST['datetime']) && isset($_POST['kegState'])){
        
        $rowId =    $_POST['rowId'];
        $datetime = date("Y-m-d H:i:s", strtotime($_POST['datetime']));
        $kegState = $_POST['kegState'];
        
        // Check filling state post variables
        if ($kegState == 0 && isset($_POST['brewId'])){
            
            $brewId = $_POST['brewId'];
            
        }
        else if ($kegState == 0){
            
            die("Error 1 : Post options not set");
            
        }
        
        // Check shipping state post variables
        if ($kegState == 1 && isset($_POST['location'])){
            
            $location = $_POST['location'];
            
        }
        else if ($kegState == 1){
            
            die("Error 2 : Post options not set");
            
        }
        
        // Check returning state post variables
        if ($kegState == 2 && isset($_POST['kegId'])){
            
            $kegId = $_POST['kegId'];
            
        }
        else if ($kegState == 2){
            
            die("Error 5 : Post options not set");
            
        }
        
    }
    else{
        
        die("Error 0 : Post options not set");
        
    }
    
    /* Create query based on state */
    // Filling state
    if ($kegState == 0){
        $sql = "fill_date = '$datetime', brew_id = $brewId";
    }
    // Shipping state
    else if ($kegState == 1){
        $sql = "ship_date = '$datetime', location = '$location'";
    }
    // Returning state
    else if ($kegState == 2){
        $sql = "return_date = '$datetime'";
    }
    // Error state
    else{
        
        // Kill page
        die("Error 3 : Incompatible kegState");
        
    }
    
    // Construct query
    $sql = "UPDATE brew_keg SET " . $sql . " WHERE row_id = $rowId";
    
    // Execute query
    mysqli_query($con, $sql) OR die("Error 4 : Query execution failed\n<br>$sql");
    
    // Add new brew_keg row
    if ($kegState == 2){
        
        $sql = "INSERT INTO brew_keg (keg_id) VALUES ($kegId)";
        mysqli_query($con,$sql) or die("Error description: " . mysqli_error($con) . "<br> $sql");
        
    }   
    
    // Redirect on success
    redirect2("Successfully updated keg", "success");
    
?>