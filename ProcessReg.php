<?php
        if (!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']) {

                $url = 'https://'.$_SERVER['HTTP_HOST'].$SERVER['REQUEST_URI'];
                header('Location: ' . $url);
        }

        $UN = $_POST['username'];
        $PW = $_POST['password'];

        echo $UN . " <br><br> ";
        echo $PW;
        
        
        
        echo password_hash("rasmuslerdorf", PASSWORD_DEFAULT);
        
        $hashedPW = password_hash($PW , PASSWORD_DEFAULT);
        echo $hashedPW;
       
/*     include 'connect.php';
        $sql = "INSERT INTO user VALUES('0','$UN','PASSWORD_DEFAULT','$hashedPW')";
        mysqli_query($con,$sql);
        session_start();
        $_SESSION['UN'] = $UN;
        header ("Location: /home.php");
*/
?>