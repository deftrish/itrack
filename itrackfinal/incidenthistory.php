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
<title>Incident History</title>
<link rel="stylesheet" href="assets/css/style.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<body>
<br>
     <br>
     <h1 class="loginheader" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Incident History</h1>
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
&nbsp; &nbsp; &nbsp; <button  type="incidentMgmt" id="incidenMgmt" class="btn btn-primary" formation="/homeitrack.php">
    <a href= "incidentMgmt.php" style="color:white;text-decoration:none"> Back to Incident Log</a> <!--Incident History page: to follow -->
                           </button>
        </div>
<br>
        <!-- suggestion: Sort By date should be added next to the search bar -->
        <!-- should we add another column for status? (e.g.: pending, resolved, etc.)-->
        <div class="row">
            <div class="container">            
                <table class="table table-striped">
                <thead>
                    <th>Incident Ticket Number</th>
                    <th>Incident</th>
                    <th>Date and Time Created</th>
                    <th>Filed by</th>
                    <th>Incident Report</th>
                    <th>Date and Time Resolved</th>
                    <th>Resolved By</th>
                </thead>
                <tbody>
                    <tr>
                            <td>#01283</td>
                            <td>Unresponsive Remark Button</td>
                            <td>March 09,2019 2:53:12AM </td>
                            <td>SPO1 Garcia</td>
                            <td>Remarks button does not...</td>
                            <td>March 10,2019 1:34:21PM</td>
                            <td>Alucard Tepes</td>
                        </tr>
                        <tr>
                            <td>#01284</td>
                            <td>Case Status cannot be updated</td>
                            <td>March 10,2019 10:31:56PM </td>
                            <td>SPO2 Tepes</td>
                            <td>Failed to update the status of...</td>
                            <td>March 12,2019 7:30:12AM</td>
                            <td>Futaba</td>
                        </tr>
                    <?php
                        if($conn->affected_rows == 0){
                    ?>
                            
                    <?php }else { 
                        while($row = $result->fetch_array()){
                            $report = $row['incidentReport'];
                            $report = (strlen($report) > 20) ? substr($report, 0, 20) . '...' : $report;
                            $userName = $row['fnameUser'].' '.$row['lnameUser'];
                            echo '<tr>';
                            echo '<td>'.$row['incidentTicket'].'</td>';
                            echo '<td>'.$row['incident'].'</td>';
                            echo '<td>'.$row['date_time'].'</td>';
                            echo "<td>$userName</td>";
                            //hindi pa din po nakikita kung sino yung nagsubmit
                            echo "<td>$report</td>";
                            echo "<td><a href='itmsview_incidentmgmt.php'>Edit Details</a></td>";
                            echo '</tr>';
                        }
                    } ?>
                </tbody>
            </table>
                       
</body>
</html>