<?php
	require "viewingheader.php";
?>

<main>
	<div class="wrapper-main">
		<section class="section-default">
		<?php
		if(isset($_GET['error'])){
		 if($_GET['error']=="emptyfields"){	
			 echo '<p class="signuperror"> Fill in all fields </p>';
		 }
		 else if ($_GET['error']=="invaliduidmail"){
			echo '<p class="signuperror"> Invalid username and email </p>';
		 }
		 else if ($_GET['error']=="invaliduid"){
			echo '<p class="signuperror"> Invalid username</p>';
		 }
		}
		?>
			<h1>Signup</h1>
			<form action="includes/signup.inc.php" method="post">
				<input type="text" name="benNum" placeholder="Ref Num">
                <input type="text" name="uidUsers" placeholder="Username">
                <input type="text" name="fnameUser" placeholder="first name">
                <input type="text" name="mnameUser" placeholder="middle name">
				<input type="text" name="lnameUser" placeholder="last name">
                <input type="text" name="emailUsers" placeholder="email address">
				<input type="password" name="pwdUsers" placeholder="Password">
				<input type="password" name="cpwdUsers" placeholder="Repeat password">

				<button type="submit" name="signup-submit">Signup</button>
				
			</form>
		</section>
	</div>

</main> 