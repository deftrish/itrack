<?php

	session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="description" content="This is an example of a meta description. This will often show up in search results.">
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
	<title>iTrack</title>
	
</head>
<body>
	<header>

		
		<nav class="navbar navbar-expand-lg navbar-dark itrackbar">
  			<a class="navbar-brand" href="#">iTrack <br> 
  			<h6> Community Relationship Management and Feedback System </h6></a>
   
</nav>
<div class="wrapper">
	<div class="form__header">
		 <div class="form__body">
       		<p class="title">
       			 iTrack Login
    		 <p>
     		 </p>
			<?php
				if (!isset($_SESSION['userId'])) {
					echo '<form action="includes/login.inc.php" method="post">
				<input type="text" name="mailuid" placeholder="Username">
				<input type="password" name="pwd" placeholder="Password">
				<button type="submit" name="login-submit">Sign In</button>	  
				</form>';
				}
			
			?>
		</div>	
	</div>
</div>
	</header>
	
	</nav>

</body>
</html>