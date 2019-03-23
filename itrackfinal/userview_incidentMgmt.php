<?php
  session_start();
	require "adminheader.php"; 
?>
<!-- change header if necessary -->
<!DOCTYPE html>
<html lang="en">
<title>Summary of Incident Filed</title>
<link rel="stylesheet" href="css/bootstrap.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<head>
<style>
.no-gutters {
  margin-right: 0;
  margin-left: 0;

}
</style>
</head>
<body>
 <br>
 <div class="container">
	 	<div class="row">
     
          <div class="col-8">
          <table class="table table-striped">
          <tbody>
            <tr> <b>Incident Details</b> </tr>
            <tr>
            <td> Incident: </td>
            <td></td>
            <!--- irereflect lang kung ano yung nasa incident details-->
            </tr>
            <tr>
            <td> Date and Time: </td>
            <td></td>
            <!--- irereflect lang kung ano yung nasa incident date-->
            </tr>
            <tr>
            <td> Submitted by: </td> 
            <td></td>
            <!--- irereflect lang kung sino yung nag submit -->
            </tr>
          </tbody>
          </table>
          </div>
          </div>
          

          <div class="row">
					<div class = "col-8">
          <table class="table table-striped">
          <tr><b>Incident Support Details</b></tr>	
          <tr>
            <td> Incident Category: </td>
            <td></td>
            <!--- irereflect lang kung ano yung nasa incident Category-->
            </tr>
            <tr>
            <td> Priority: </td>
            <td></td>
            <!--- irereflect lang kung ano yung nasa priority-->
            </tr>
            <tr>
            <td> Short Description: </td>
            <td></td>
            <!--- irereflect lang kung ano yung nasa short description-->
            </tr>       
          </div>
          </div>
          </tbody>
          </table>
          <button  type="cancel" id="cancel" class="btn btn-primary" formation="/homeitrack.php">
                    <a href= "userview_incidenthomepage.php" style="color:white;text-decoration:none">Close</a>
          </button>  <!--Ayaw niya pong mag redirect sa userview homepage located at "newUI" folder--> 
          </div>      
          </body>
          </html>


