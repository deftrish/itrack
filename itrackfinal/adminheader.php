<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark itrackbar">
  <a class="navbar-brand" href="index.php">iTrack <br> </a>
  
<div class="collapse navbar-collapse adminHeaderNav" id="navbarColor01">
    <ul class="adminHeaderNav navbar-nav mr-auto" >
      <li class="nav-item" style="float:left;">
        <a class="nav-link" a href="homeitrack.php">
          <button class="dropbtn">Home&nbsp;&nbsp;</button>
        </a>
      </li>
      <li class="nav-item" style="float:left;">
        <a class="nav-link" href="feedback.php">
          <button class="dropbtn">Feedback&nbsp;&nbsp;</button>
        </a> 
      </li>
      <li>
        <a class="nav-link" style="float:left;">
          <button class="dropbtn">Dashboard&nbsp;&nbsp;</button>
        </a>
      </li>          
    </ul>
</div>

  <div class="dropdown" style="float:right;">
  <button class="dropbtn"><?php echo $_SESSION['userUid'] ?> &nbsp;&nbsp;<i class="fa fa-caret-down"></i></button>

  <div class="dropdown-content">
     <a href="incidentMgmt.php">Incident Management Log</a>
  <a href="acctMgmt.php">Account</a>
  <a href="includes/logout.inc.php">Sign out</a>
  </div>
  </div>

</nav>
</body>
</html>


