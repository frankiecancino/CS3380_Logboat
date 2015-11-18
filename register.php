<?php
        if (!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']) {

                $url = 'https://'.$_SERVER['HTTP_HOST'].$SERVER['REQUEST_URI'];
                header('Location: ' . $url);
        }

?>

<html>
        <head><title>Register</title></head>
<body>
        <form class="form-signin" action="ProcessReg.php" method="POST">

                                <h2 class="form-signin-heading">Please Sign up</h2>

                                <input  name="username" placeholder="Username" required="yes" autofocus="yes">

                                <input  name="password"  type="password" placeholder="Password" required="yes">

                                <hr>
                                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
        </form>
</body>

</html>