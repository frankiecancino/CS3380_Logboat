
<?php
        if (!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']) {

                $url = 'https://'.$_SERVER['HTTP_HOST'].$SERVER['REQUEST_URI'];
                header('Location: ' . $url);
        }

?>
<html>
        <head>
                <title>Logboat Brewery Company</title>
        </head>

        <body>
<?php
        session_start();
        if (!isset($_SESSION['UN'])) {

                 header ("Location: /lab9/index.php");

        }

        $UN = $_SESSION['UN'];

        include 'connect.php';

        $sql = "SELECT admin FROM user WHERE username =". " \"$UN\"; ";
        $results = mysqli_query($con, $sql);

        echo "<br><br>";

        $Rarray = mysqli_fetch_array($results);
        $admin = $Rarray["admin"];


        if($admin == 0){
        echo "Welcome " . $_SESSION['UN'] . " to Logboat Brewery";
        echo "<br><br>";
        echo "<button type=" . "submit" . "><a href=" . "/lab9/index.php" . ">Log Out</button>";
        }
        else{

        echo "Welcome to Logboat Brewery!";
        echo "<br><br>";
        echo "<button type=" . "submit" . "><a href=" . "/lab9/index.php" . ">Log Out</button>";

        }
?>

        </body>
</html>