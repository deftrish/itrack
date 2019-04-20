<?php
  session_start();
  require "adminheader.php";
  include 'includes/dbh.inc.php';
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
  $isClosed = $row['is_closed'];
  $comment = $row['comment'];
?>
<!-- change header if necessary -->
<!DOCTYPE html>
<html lang="en">
<title>Summary of Incident Filed</title>
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
  <!-- Modal -->
  <div class="modal fade" id="closeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			Are you sure you want to close this incident
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a class='btn btn-primary' href= "includes/completeIncident.inc.php?id=<?=$id?>" style="color:white;text-decoration:none">Close Case</a>   
      </div>
    </div>
  </div>
</div>
<!-- Modal End -->
 <!-- Modal -->
 <div class="modal fade" id="returnModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Return Case</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form method="get" action="includes/returnIncident.inc.php">
			<div class="form-group">
				<label for="exampleFormControlTextarea1">Reason for returning</label>
				<input type="hidden" name="id" value="<?=$id?>"/>
				<textarea name="comment" class="form-control" id="exampleFormControlTextarea1" style="min-width: 100%" rows="6"></textarea>
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-danger" value="Return">
		</form>
      </div>
    </div>
  </div>
</div>
<!-- Modal End -->
	 	<div class="row">
          <div class="col-8">
          <table class="table table-striped">
          <tbody>
            <tr> <b>Incident Details</b> </tr>
            <tr>
            <td><span class="font-weight-bold"><?=$row['incident']?></span></td>            
            <td></td>
            <!--- irereflect lang kung ano yung nasa incident details-->
            </tr>
            <tr>
            <td> Date and Time: </td>
            <td><?=$date->format('Y-M-d H:i:s');?></td>
            <!--- irereflect lang kung ano yung nasa incident date-->
            </tr>
            <tr>
            <td> Submitted by: </td> 
            <td><?=$name?></td>
            <!--- irereflect lang kung sino yung nag submit -->
            </tr>
			<tr>
            <td> Reason for Return: </td> 
            <td><?=$comment?></td>
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
          <button  type="cancel" id="cancel" class="btn btn-primary" formation="/homeitrack.php">
                    <a href= "incidentMgmt.php" style="color:white;text-decoration:none">Close</a>

          </button>  <!--Ayaw niya pong mag redirect sa userview homepage located at "newUI" folder--> 
		  <?php if($isClosed) {?>          
			<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#closeModal">Close Case</button>
          <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#returnModal">Return</button>
          <!-- <a class='btn btn-danger' href= "includes/closeIncident.inc.php?id=<?=$id?>" style="color:white;text-decoration:none">Return</a>    -->
			<?php }?> 
          </div>      
          </body>
          </html>


