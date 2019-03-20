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
 <div class="row justify-content-end">
 <div class = "col-md-4 offset-md-4">
 					              <button  type="submit" id="sendincidentcategory" class="btn btn-primary" formation="/homeitrack.php">
                            <a href= "IncidentMgmt.php" style="color:white;text-decoration:none">Re-Open</a>
                           </button> <!---Na enable lang yung button na to if nakaclose na yung case tapos nag occur na naman yung problem-->
                           <br>
                            <br>
                            <button  type="cancel" id="archiveIncident" class="btn btn-primary" formation="/homeitrack.php">
                            <a href= "IncidentMgmt.php" style="color:white;text-decoration:none">Archive</a>
                            </button>  <!--- Si ITMS or yung nagsubmit lang yung pwede magclick ng button na to. Pagkaclick, mapupunta na siya sa incident history-->
                            <br>
                            <br>
                            <button  type="cancel" id="cancel" class="btn btn-primary" formation="/homeitrack.php">
                            <a href= "IncidentMgmt.php" style="color:white;text-decoration:none">Cancel</a>
                            </button>  <!--- Si ITMS or yung nagsubmit lang yung pwede magclick ng button na to. Pagkaclick, mapupunta na siya sa incident history-->
                        </div>
 
 </div>
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
          </body>
          </html>


