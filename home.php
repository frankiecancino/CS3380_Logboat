
<?php
        include 'include.php';
        
        $adminString = $isAdmin ? "(Admin)" : "";
        echo "Welcome $loggedInUsername $adminString to Logboat Brewery!";
        
?>
        <a href='logout.php'>Log Out</a>
        </body>
</html>