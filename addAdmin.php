<?php
    /*
	 * addAdmin.php
	 *
	 * Description: Adds admin to database.
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
		include 'connect.php';
		
		$username = "admin";
		$password = "password";
        
        // Hash Password
        $hashedPassword = crypt($password);
        
        // Admin check
        $admin = 1;
       
        // Insert into database
        $sql = "INSERT INTO `user` (`username`, `salt`, `hashed_password`, `admin`) VALUES ('$username', '0', '$hashedPassword', $admin)";
        
        // Execute query
        mysqli_query($con,$sql) or die("Cannot execute query"); // ToDo: Output mysql error
        
        // Redirect on successful registration
        die ("Successfully added user: $username");
        
?>