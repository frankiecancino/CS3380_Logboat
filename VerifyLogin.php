<?php
        /*
         * VerifyLogin.php
         *
         * Description: Processes logins. Verifies using hashing and salting.
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
        $pageOptions["loginRequired"] = false;
        $pageOptions["script"] = true; 
           
        include 'include.php';

        // Get POST variables
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        // SQL query        
        $sql = "SELECT `hashed_password`, `admin` FROM `user` WHERE `username` = '$username';";
        
        // Execute query and get password hash
        if ($res = mysqli_query($con, $sql)){
                
                $resArray = mysqli_fetch_array($res);
                $hashedPassword = $resArray['hashed_password'];
                $isAdmin = $resArray['admin'];
                
        }
        
        // If password matches
        if ($hashedPassword === crypt($password, $hashedPassword)) {
                
                $_SESSION['UN'] = $username;
                $_SESSION['username'] = $username;
                $_SESSION['admin'] = $isAdmin;
                
                redirect2("Successfully logged in as $username", "success");
                
        }else{
                
                redirect("index.php");
                
        }
?>