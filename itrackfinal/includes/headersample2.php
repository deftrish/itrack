<?php

	session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="description" content="This is an example of a meta description. This will often show up in search results.">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<header>
		

		<nav clas="nav-header-main">
			<a class="header-logo" href="index.php">
			<img src="img/logo.jpg" alt="logo">
		</a>
			<ul>
			  <li><a href="index.php">Home</a></li>
			  <li><a href="#">Portfolio</a></li>
			  <li><a href="#">About Me</a></li>
			  <li><a href="#">Contact</a></li>
			</ul> 
		</nav>
		<div class="header-login">
			<?php
				if (!isset($_SESSION['userId'])) {
					echo '<form action="includes/logout.inc.php" method="post">
					<button type="submit" name="logout-submit">Logout</button>
				</form>';
				}
				else {
					echo '<form action="includes/login.inc.php" method="post">
				<input type="text" name="mailuid" placeholder="E-mail/Username">
				<input type="password" name="pwd" placeholder="Password">
				<button type="submit" name="login-submit">Login</button>	  
				</form>
				<a href="signup.php" class="header-signup">Signup</a>';

				}
			?>
		
				
		</div>
	</header>
		</nav>


</body>
</html>