<?php
    session_start();
    include 'includes/dbh.inc.php';
    if(!isset($_SESSION['userId'])){
        header('Location: index.php');
    }
    if(isset($_POST['submit'])){
      $id = $_POST['id'];
      $priority = $_POST['priority'];
      $category = $_POST['incidentCategory'];
      $description = $_POST['shortDescription'];
      $sql = "UPDATE incident_mgmt SET incidentCategory = '$category' , incidentPriority = '$priority', incidentDesc = '$description' where incidentTicket = $id";
      if($conn->query($sql)){
        header('Location: incidentMgmt.php');
      }
    }
    if(!isset($_GET['id'])){
      header('Location: incidentMgmt.php');
    }
    $id = $_GET['id'];
    $sql = "SELECT * from incident_mgmt join users on incidentInv = idUsers where incidentTicket = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $date = new DateTime($row['date_time']);
    $name = $row['fnameUser'] . ' ' . $row['lnameUser'];
    $priority = $row['incidentPriority'];
    $category = $row['incidentCategory'];
    $description = $row['incidentDesc'];

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
                           <button  type="cancel" id="cancelincident" class="btn btn-primary" formation="/homeitrack.php">
                            <a href= "includes/closeIncident.inc.php?id=<?=$id?>" style="color:white;text-decoration:none">Close Case</a>
                            </button> <!----- Si ITMS lang ang pwede magclick ng button na to-->   
                        </div>
 
 </div>
	 	<div class="row">
     
          <div class="col-8">
          <table class="table table-striped">
          <tbody>
            <tr> <b>Incident Details</b> </tr>
            <tr>
            <td> Incident: </td>
            <td><?=$row['incident']?></td>
            <!--- irereflect lang kung ano yung nasa incident details-->
            </tr>
            <tr>
            <td> Date and Time: </td>
            <td><?=$date->format('Y-m-d H:i:s');?></td>
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
					<div class = "col-8">
          <b>Incident Support Details</b>	
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
          <label for="incidentCategory"> Incident Category </label>
                             <select name="incidentCategory" class="form-control" onmousedown="if(this.options.length>5){this.size=5;}" onchange='this.size=0;' onblur="this.size=0;" class=form-control>
                                <option value="choose" disabled selected hidden>Choose...</option>
                                <option value="systemError" <?php echo $category=='systemError'? 'selected': ''?>>System Error</option>
                                  <!-- insert categories here -->
                                <option value="UI" <?php echo $category=='UI'? 'selected': ''?> >User Interface</option>
                                <option value="networkInterruption"<?php echo $category=='networkInterruption'? 'selected': ''?> > Network Interruption</option>
                              </select>
                            </div>
                          </div>
          <div class="row">
          </div>
          <div class="row">
					<div class = "col-8">  
            <label for="priority"> Priority</label>
                      <select name="priority"  class="form-control" onmousedown="if(this.options.length>5){this.size=5;}" onchange='this.size=0;' onblur="this.size=0;" class=form-control>
                                <option value="choose" disabled selected hidden>Choose...</option>
                                <option value="low" <?php echo $priority=='low'? 'selected': ''?> >Low</option>
                                <option value="medium" <?php echo $priority=='medium'? 'selected': ''?> >Medium</option>
                                <option value="high" <?php echo $priority=='high'? 'selected': ''?> >High</option>
                                <!-- what other priority levels are there? -->
                        </select>
                      </div>
                    </div>
          <div class="row">
          </div>         
          <div class="row">
					<div class = "col-8">
          <label for="shortDescription"> Short Description </label>
          <textarea class="form-control" name="shortDescription"  rows="4.5" cols="50"><?=$description?></textarea>
					</div>
        </div>
        <br>
        <input type="hidden" name="id" value="<?=$id?>">
    		<div class = "col-8">
 					<input name="submit" type="submit" id="sendincidentcategory" class="btn btn-primary" formation="/homeitrack.php">

                           <!--si ITMS ang ang pwedeng gumalaw ng incident details, ang pwede lang galawin ng nagsubmit is yung re-open, cancel incident, cancel button-->

                           <button  type="cancel" id="cancelincident" class="btn btn-primary" formation="/homeitrack.php">
                            <a href= "IncidentMgmt.php" style="color:white;text-decoration:none"> Cancel</a>
                            </button>    
                        </div>

                    </div>
                    </div>

               

                </form>
                </div></div>
                </div></div></div></body></html>


