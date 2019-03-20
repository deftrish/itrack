<?php
    session_start();
    if(!isset($_SESSION['userId'])){
        header('Location: index.php');
    }
    include 'includes/dbh.inc.php';
    $sql = "SELECT * from incident_mgmt join users on incidentInv = idUsers";
    $result = $conn->query($sql);
	require "adminheader.php"; 
    

?>

<!DOCTYPE html>
<html lang="en">
<title>Incident Management</title>
<link rel="stylesheet" href="assets/css/style.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<body>
 <br>
	 <br>
	 <h1 class="loginheader" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Incident Management Log</h1>
	 <div class="container">

        <div class="row">
            <div class="col-md-4">
                <div class="input-group">
                    <input class="form-control py-2 border-right-0 border" type="text" placeholder="Search Ticket Number" class=form-control>
                    <span class="input-group-append">
                        <button class="btn btn-outline-secondary border-left-0 border" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </div>
<button  type="newlog" id="newlog" class="btn btn-primary" formation="/homeitrack.php">
	<a href= "addIncident.php" style="color:white;text-decoration:none"> New Log</a> <!--New Log page: to follow -->
                           </button>
&nbsp; &nbsp; &nbsp; <button  type="incidenthistory" id="incidenthistory" class="btn btn-primary" formation="/homeitrack.php">
	<a href= "incidenthistory.php" style="color:white;text-decoration:none"> Incident History</a> <!--Incident History page: to follow -->
                           </button>
        </div>
<br>
        <!-- suggestion: Sort By date should be added next to the search bar -->

        <div class="row">
            <div class="container">            
                <table class="table table-striped">
                <thead>
                    <th>Incident Ticket Number</th>
                    <th>Incident</th>
                    <th>Date and Time Created</th>
                    <th>Filed by</th>
                    <th>Incident Report</th>
                </thead>
                <tbody>
                    <?php
                        if($conn->affected_rows == 0){
                    ?>
                        <tr>
                            <td>No Data</td>
                        </tr>
                            
                    <?php }else { 
                        while($row = $result->fetch_array()){
                            $report = $row['incidentReport'];
                            $id = $row['incidentTicket'];
                            $report = (strlen($report) > 20) ? substr($report, 0, 20) . '...' : $report;
                            $userName = $row['fnameUser'].' '.$row['lnameUser'];
                            echo '<tr>';
                            echo '<td>'.$row['incidentTicket'].'</td>';
                            echo '<td>'.$row['incident'].'</td>';
                            echo '<td>'.$row['date_time'].'</td>';
                            echo "<td>$userName</td>";
                            //hindi pa din po nakikita kung sino yung nagsubmit
                            echo "<td>$report</td>";
                            echo "<td><a href='itmsview_incidentmgmt.php?id=$id'>Edit Details</a></td>";
                            echo '</tr>';
                        }
                    } ?>
                </tbody>
            </table>

</body>
</html>