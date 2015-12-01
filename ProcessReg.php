<?php
        include 'include.php';
        
        // Get POST variables
        if (isset($_POST['username']) && isset($_POST['password'])){
                $username = $_POST['username'];
                $password = $_POST['password'];
        }
        else{
                // ToDo: Better redirect system
                die("Username and/or Password not submitted");
        }
        
        // Hash Password
        $hashedPassword = crypt($password);
        
        // Admin check
        $admin = isset($_POST['admin']) ? 1 : 0;
       
        // Insert into database
        $sql = "INSERT INTO `user` (`username`, `salt`, `hashed_password`, `admin`) VALUES ('$username', '0', '$hashedPassword', $admin)";
        
        // Execute query
        mysqli_query($con,$sql) or die("Cannot execute query"); // ToDo: Output mysql error
        
        // Redirect on successful registration
        header ("Location: home.php");
        
?>