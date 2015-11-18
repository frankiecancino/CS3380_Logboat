<?php

        if (!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']) {

                $url = 'https://'.$_SERVER['HTTP_HOST'].$SERVER['REQUEST_URI'];
                header('Location: ' . $url);
        }
        $host = "us-cdbr-azure-central-a.cloudapp.net";
        $user = "bac7425156859d";
        $pass = "ad2aa049";
        $db = "logboatmysqldb";
        $con = mysqli_connect($host, $user, $pass, $db) or die ("Connection Error" . mysqli_error($link));

?>
