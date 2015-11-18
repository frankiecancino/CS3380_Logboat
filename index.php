<html>
  <head>
    <title>Logboat Brewery</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <br>
    <div>
    <div id="socialMedia">
      <form action="VerifyLogin.php" method="POST">
        <hr>
        <br>
        <input  name="username"  placeholder="Username" required="yes" autofocus="yes">
        <input type="password" name="password" class="form-control" placeholder="Password" required="yes">
        <button  type="submit">Sign in</button>
      </form>
      <hr>
     </div>
      <image id="logboatLogo" src="images/logboatlogo.png" alt="logboat_logo">
      <div id="loginForm">
      <form action="VerifyLogin.php" method="POST">
        <hr>
        <br>
        <input  name="username"  placeholder="Username" required="yes" autofocus="yes">
        <input type="password" name="password" class="form-control" placeholder="Password" required="yes">
        <button  type="submit">Sign in</button>
      </form>
      <hr>
     </div>
     </div>
                             <form  action="register.php">
                        <h2>Or Register</h2>
                                <button type="submit">Register</button>
                        </form>
  </body>
</html>
