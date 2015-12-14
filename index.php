<?php
   /*Copyright (c) 2015 Frankie Cancino, Quinton Miller, Trent Broeker, Sydney Bates, Matt Haruza



Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:



The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.



THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.  IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
*/
 ?>
<html>
  <head>
    <title>Logboat Brewery</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>
			$(document).ready(function(){
   				$("#home_text").click(function(){
      		  		$.ajax({url: "home.txt", success: function(result){
           		 		$("#content").html(result);
        			}});
   			 	});
			});
		</script>
  </head>
  <body>
    <br>
    <div id="container">
      <hr>
    <div id="socialMedia">
      <hr>
        <a href="http://instagram.com/logboatbrewing"><img class="social-icon" src="images/instagram_icon.png"></a>
        <a href="http://twitter.com/logboatbrewing"><img class="social-icon" src="images/twitter_icon.png"></a>
        <a href="https://www.facebook.com/LogboatBrewingCompany"><img class="social-icon" src="images/facebook_icon.png"></a>
        <br>
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
     <image id="logboat_scene" src="images/logboat_scene.jpg" alt="logboat_scene">
     <iframe id="logboat_scene" width="560" height="315" src="https://www.youtube.com/embed/YZpZqeJ4Kz4" frameborder="0" allowfullscreen></iframe>
     <image id="logboat_scene" src="images/logboat_scene2.jpg" alt="logboat_scene2">
     <div id="history">
       <h3>HOW LOGBOAT GOT ITS NAME</h3>
       <hr>
       <p>As most Missourians know, the name Missouri river and our state's name have a lengthy history, nearly as dragged out as the waterway itself. Missouri, as we came to be, lies on territory once protected by the Missouria, Osage and Illinois indians. Missouria has been passed down in the tongue of the Illinois to mean, “one who has dugout canoes,” or “people of the wooden canoe.”</p>
       <div id="content"></div>
       <button id="home_text">Read More...</button>
       <br>
      </div>
  </body>
</html>
