<?php
  session_start();
    require "adminheader.php"; 
    require 'includes/dbh.inc.php';
    if(!isset($_SESSION['userId'])){
        header('Location: index.php');
    }

    if(!isset($_GET['id'])){
        header('Location: incidenthistory.php');
    }
    $id = $_GET['id'];

    $sql = "SELECT * FROM incident_mgmt join users on incidentInv = idUsers where incidentTicket = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $date = new DateTime($row['date_time']);
    $timeResolved = new DateTime($row['resolved_at']);
    $name = $row['fnameUser'] . ' ' . $row['lnameUser'];
    $priority = $row['incidentPriority'];
    $category = $row['incidentCategory'];
    $description = $row['incidentDesc'];
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
            <div class="col-sm-8">
                <table class="table table-striped">
                    <tbody>
                        <tr> <b>Incident Details</b> </tr>
                        <tr>
                            <td> Incident: </td>
                            <td><?=$row['incident']?></td>
                                    <!--- irereflect lang kung ano yung nasa incident details-->
                        </tr>
                        <tr>
                            <td> Date and Time Created: </td>
                                <td><?=$date->format('Y-M-d H:i:s');?></td>
                                    <!--- irereflect lang kung ano yung nasa incident date-->
                        </tr>
                        <tr>
                            <td> Date and Time Resolved: </td>
                                <td><?=$timeResolved->format('Y-M-d H:i:s');?></td>
                                     <!--- irereflect lang kung ano yung nasa incident date-->
                        </tr>
                        <tr>
                            <td> Submitted by: </td> 
                                <td><?=$name?></td>
                                    <!--- irereflect lang kung sino yung nag submit -->
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
          

        <div class="row">
			<div class = "col-sm-8">
                <table class="table table-striped">
                    <tr><b>Incident Support Details</b></tr>	
                    <tr>
                        <td> Incident Category: </td>
                            <td>
                                <?php
                                    switch ($category){
                                        case 'systemError':
                                            echo 'System Error';
                                            break;
                                        case 'UI': 
                                            echo 'User interface';
                                            break;
                                        case 'networkInterruption':
                                            echo 'Network Interruption';
                                            break;
                                        default:
                                            echo '';
                                    }
                                ?>
                            </td>
                                <!--- irereflect lang kung ano yung nasa incident Category-->
                    </tr>
                    <tr>
                        <td> Priority: </td>
                            <td>
                            <?php
                                switch ($priority){
                                    case 'low':
                                        echo 'Low';
                                        break;
                                    case 'medium': 
                                        echo 'Medium';
                                        break;
                                    case 'high':
                                        echo 'High';
                                        break;
                                    default:
                                        echo '';
                                }
                            ?>
                            </td>
                                <!--- irereflect lang kung ano yung nasa priority-->
                    </tr>
                    <tr>
                        <td> Short Description: </td>
                            <td><?=$description?></td>
                                <!--- irereflect lang kung ano yung nasa short description-->
                    </tr>       
            </div>
        </div>
                </tbody>
            </table> 
                <a href= "includes/openIncident.inc.php?id=<?=$id?>" class="btn btn-primary" style="color:white;text-decoration:none">Re-Open</a>
            
                <button  type="cancel" id="cancelIncidentbutton" class="btn btn-primary" formation="/homeitrack.php">
                    <a href= "incidenthistory.php" style="color:white;text-decoration:none">Close</a>
                </button>  <!--back to the incident history--> 
</div>    
</body>
</html>


