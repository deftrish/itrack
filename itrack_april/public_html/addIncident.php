<?php
session_start();
if(!isset($_SESSION['userId'])){
    header('Location: index.php');
}
    require "adminheader.php";
   include_once 'includes/admin.inc.php';
   if (isset($_POST['incident-submit'])) {
    // $incidentTicket = $_POST['incidentTicket'];
    $incidentTitle = $_POST['incidentlog'];
    $date_time = $_POST['incidentdate'].' '.$_POST['incidenttime'];
    $incidentInv = $_SESSION['userId'];
    $incidentReport = $_POST['report'];

    $sql = "INSERT INTO incident_mgmt (incident, date_time, incidentInv, incidentReport) 
    VALUES ('$incidentTitle', '$date_time', '$incidentInv', '$incidentReport')";      
    if (!$conn->query($sql)){
        $error = "Something went wrong";
    }else{
        header("Location: incidentMgmt.php?");
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <title>iTrack</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<style>

</style>

<body>
<br>
<br>

<div class="container">
	 	<div class="row">
            <div class="col-lg-0.5"></div>
            <div class="card">
                 <div class="card-body">            

            
                <div id="iu">

                   <form class="form-group" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	                <b>General Information</b>
                    <br>
                    <br>



        <div class="row">
                          <div class="col-lg-4">
                             
                             <b>Incident</b>
                             <input type="text" name="incidentlog" class=form-control placeholder="Enter incident...">
                            </div>
                        </div>
                        <br>
                        
   		<div class="row">
                          <div class="col-lg-4">
   							<b>Date</b><input type="date" name="incidentdate" class=form-control>
   						</div>

   						<div class="col-lg-4">
  							<b>Time</b> <input type="time" name="incidenttime" class=form-control>
  						</div>
  					</div>
                    <br>

					<br>
					 <b>Incident Report</b>	
					 <div class="row">
  					 <div class="col-lg-4">
					<textarea class="scrollabletextbox" name="report"  rows="4.5" cols="130"></textarea>
					</div>
                    <br>
 					<div class="col-lg-9">
 					<input class="btn btn-primary" type="submit" name="incident-submit" value="Submit">
                        </div>
                    </div>
                </form></div></div></div></div></div>
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    

</body>

</html>
