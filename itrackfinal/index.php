<?php
	require "loginheader.php";
?>

		<main>

<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

span.psw {
  float: left;
  padding-top:10px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 500px) {
  span.psw {
     display: block;
     float: none;
  }


</style>
</head>
<body>



<div class="container">
        <div class="row justify-content-center align-items-center" style="height:60vh" >
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <form action="homeitrack.php" method="post" >
                        	<h4>iTrack Login</h4>
							<div class="form-group">
                                <b>Username</b> <input type="text" class="form-control" name="username">
                            </div>
                            <div class="form-group">
                                <b>Password</b><input type="password" class="form-control" name="password">
                            </div>
                            <button type="submit" id="sendlogin" class="btn btn-primary" formaction="/homeitrack.php">
                            	<?php 
                            	echo '<a href= "homeitrack.php" style="color:white;text-decoration:none" > Sign In</a>';

                            	?></button>
                        </form>
                        <span class="psw"><a href="#">Forgot password?</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    



      

  </div>


  
  </div>
</form>

</body>

		</main>

<?php
	require "footer.php";
?>
