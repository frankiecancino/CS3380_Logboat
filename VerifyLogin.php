<?php
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
                header("Location: home.php");
        }else{
                header("Location: index.php");
        }
?>