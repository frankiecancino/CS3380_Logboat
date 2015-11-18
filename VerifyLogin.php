<?php

        if (!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']) {

                $url = 'https://'.$_SERVER['HTTP_HOST'].$SERVER['REQUEST_URI'];
                header('Location: ' . $url);
        }
        

        $UN = $_POST['username'];
        $PW = $_POST['password'];
        
        include 'connect.php';
        $sql = "SELECT hashed_password FROM user WHERE username =". " \"$UN\"; ";
        echo $sql;

        $results = mysqli_query($con, $sql);

        echo "<br><br>";

        $Rarray = mysqli_fetch_array($results);
        $hash = $Rarray["hashed_password"];

        echo $hash;
        echo "<br><br>";


        if (password_verify($PW, $hash)) {
                session_start();
                $_SESSION['UN'] = $UN;
                header ("Location: home.php");
        }else{
                echo 'Invalid Username / password.';
                echo "<form  action=\"register.php\">";
                echo "<h4>Register</h4>";
                echo "<button type=\"submit\">Register</button>";
                echo "</form>";
                echo "<br><br>Or Return Home<br><br>";
                echo "<button type=" . "submit" . "><a href=" . "index.php" . ">Return To Login</button>";
        }
?>