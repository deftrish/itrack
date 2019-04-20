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
    $comment = $row['comment'];

    $sql = "SELECT * from admins left join users on userID = idUsers where admin_type = 'itms'";
    $escalateUsers = $conn->query($sql);

	require "adminheader.php"; 
    

?>
<!-- change header if necessary -->
<!DOCTYPE html>
<html lang="en">
<title>Summary of Incident Filed</title>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
                        </div>
 
 </div>
    <div class="row">
      <div class="col-sm-3 offset-sm-7">
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#resolveModal">
      Resolve Case
      </button>
      <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#escalateModal">
      Escalate Case
      </button>
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
            <tr>
            <td> Comment: </td> 
            <td><?=$comment?></td>
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
                            <a href= "incidentMgmt.php" style="color:white;text-decoration:none"> Cancel</a>
                            </button>    
                        </div>

                    </div>
                    </div>

               

                </form>
                </div></div>
                </div></div></div>
                
                <!-- Modal -->
              <div class="modal fade" id="resolveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Do you really want to resolve the case?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                      <a class='btn btn-success' href= "includes/closeIncident.inc.php?id=<?=$id?>" style="color:white;text-decoration:none">Yes</a>   
                    </div>
                  </div>
                </div>
              </div>
              <!-- Moda end -->
                              <!-- Modal -->
                <div class="modal fade" id="escalateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Escalate</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                      <form method="post" action="includes/escalateIncident.inc.php">
                    <div class="modal-body">
                        <div class="form-group">
                        <label for="exampleFormControlSelect1">Escalate incident to:</label>
                        <select class="form-control" name="userId" id="exampleFormControlSelect1">
                          <?php
                            while($user = $escalateUsers->fetch_assoc()){
                              $name = $user['fnameUser'].' '.$user['lnameUser'];
                              $escalateuserID = $user['userID'];
                              echo "<option value='$escalateuserID'>$name</option>";
                            }
                          ?>
                        </select>
                      </div>
                      </div>
                    <div class="modal-footer">
                      <input type="hidden" value="<?=$_GET['id']?>" name="ticketId"/>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                      <input name="submit" type="submit" class="btn btn-warning" value="Escalate">
                    </div>
                      </form>
                  </div>
                </div>
              </div>
              <!-- Moda end -->
                
                </body></html>


