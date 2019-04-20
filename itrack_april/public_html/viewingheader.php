<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<style>

input[type=refnum] {
  width: 200%;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
  background-color: white;
  background-image: url('assets/img/searchicon.png');
  background-position: 10px 10px; 
  background-repeat: no-repeat;
  padding: 12px 20px 12px 40px;
}
</style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark itrackbar">
  			<a class="navbar-brand" href="index.php">iTrack <br> 
  			<h6> Community Relationship Management and Feedback System </h6></a>
        <div class="collapse navbar-collapse adminHeaderNav" id="navbarColor01">
    <ul class="adminHeaderNav navbar-nav mr-auto" >
      <li class="nav-item" style="float:left;">
        </a>
      </li>
      <li class="nav-item" style="float:left;">
        </a> 
      </li>
      <li>
      </li>          
    </ul>
</div>

</a>
<div class="dropdown" style="float:right;">
  <button class="dropbtn"><?php echo $_SESSION['userUid'] ?> &nbsp;&nbsp;<i class="fa fa-caret-down"></i></button>

  <div class="dropdown-content">
  <a href="includes/logout.inc.php">Sign out</a>
  </div>
  </div>




</nav>
</nav>