<html>
  <head>
    <title>Logboat Brewery</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <div>
      <form action="VerifyLogin.php" method="POST">
        <h2>Please Sign In</h2>
        <input  name="username"  placeholder="Username" required="yes" autofocus="yes">
        <input type="password" name="password" class="form-control" placeholder="Password" required="yes">
        <hr>
        <button  type="submit">Sign in</button>
      </form>
      <br>
      <hr>
      <br>
      <form  action="register.php">
        <h2>Or Register</h2>
        <button type="submit">Register</button>
      </form>
    </div>
  </body>
</html>
